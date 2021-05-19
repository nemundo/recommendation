<?php

namespace Hackathon\Page;

use Hackathon\Com\KeywordForm;
use Hackathon\Data\Keyword\KeywordReader;
use Hackathon\Data\Topic\TopicReader;
use Hackathon\Data\WordIndex\WordIndexPaginationReader;
use Hackathon\Parameter\KeywordParameter;
use Hackathon\Parameter\TopicParameter;
use Hackathon\Site\KeywordDeleteSite;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Text\TextBold;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Formatting\Small;
use Nemundo\Html\Heading\H3;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Web\Site\Site;

class HomePage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new BootstrapThreeColumnLayout($this);
        $layout->col1->columnWidth = 2;
        $layout->col2->columnWidth = 8;
        $layout->col3->columnWidth = 2;


        $list = new BootstrapSiteList($layout->col1);

        $reader = new TopicReader();
        $reader->addOrder($reader->model->topic);
        foreach ($reader->getData() as $topicRow) {

            if ((new TopicParameter())->getValue() == $topicRow->id) {

                $list->addActiveText($topicRow->topic);

            } else {

                $site = new Site();
                $site->title = $topicRow->topic;
                $site->addParameter(new TopicParameter($topicRow->id));

                $list->addSite($site);

            }

        }


        //$form=new TopicForm($layout->col1);


        $parameter = new TopicParameter();
        if ($parameter->hasValue()) {


            $showTopic = [];


            $topicRow = (new TopicReader())->getRowById($parameter->getValue());

            $h3 = new H3($layout->col2);
            $h3->content = $topicRow->topic;


            /*  $form = new SearchForm($layout->col2);

              $formRow = new BootstrapRow($form);

              $newsType = new NewsTypeListBox($formRow);
              $newsType->searchMode = true;
              $newsType->submitOnChange = true;*/


            $newsReader = new WordIndexPaginationReader();  // new NewsIndexReader();
            $newsReader->model->loadNews();
            $newsReader->model->news->loadNewsType()->newsType->loadContentType();

            $newsReader->model->loadWord();


            //DbConfig::$sqlDebug=true;

            $keywordReader = new KeywordReader();

            $keywordList = [];


            $keywordCount = 0;

            $keywordReader->filter->andEqual($keywordReader->model->topicId, $topicRow->id);
            foreach ($keywordReader->getData() as $keywordRow) {

                $newsReader->filter->orEqual($newsReader->model->word->word, $keywordRow->keyword);

                $keywordList[] = $keywordRow->keyword;

                $keywordCount++;

                //$row=new TableRow($table);
                //$row->addText($keywordRow->keyword);

            }


            if ($keywordCount > 0) {

                foreach ($newsReader->getData() as $newsIndexRow) {


                    if (!isset($showTopic[$newsIndexRow->newsId])) {

                        $showTopic[$newsIndexRow->newsId] = true;


                        $bold = new TextBold();
                        $bold->keywordList = $keywordList;


                        $small = new Small($layout->col2);
                        //$small->content = $newsIndexRow->news->newsType->contentType->contentType;

                        $b = new Bold($small);
                        $b->content = $newsIndexRow->news->newsType->contentType->contentType . ' ';


                        $link = new UrlHyperlink($layout->col2);
                        $link->content = $bold->getBoldText($newsIndexRow->news->title);   //  $newsIndexRow->news->title;
                        $link->url = $newsIndexRow->news->url;
                        $link->openNewWindow = true;

                        $p = new Paragraph($layout->col2);
                        $p->content = $bold->getBoldText($newsIndexRow->news->description);


                        /*$ul=new UnorderedList($layout->col2);

                        $wordReader=new WordIndexReader();
                        $wordReader->model->loadWord();
                        $wordReader->filter->andEqual($wordReader->model->newsId,$newsIndexRow->id);
                        foreach ($wordReader->getData() as $wordIndexRow) {
                            $ul->addText($wordIndexRow->word->word);
                        }*/


                    }

                }


                $pagination = new BootstrapPagination($layout->col2);
                $pagination->paginationReader = $newsReader;


            }


            $form = new KeywordForm($layout->col3);


            $table = new AdminTable($layout->col3);

            $keywordReader = new KeywordReader();
            $keywordReader->filter->andEqual($keywordReader->model->topicId, $topicRow->id);
            foreach ($keywordReader->getData() as $keywordRow) {

                $row = new TableRow($table);
                $row->addText($keywordRow->keyword);

                $site = clone(KeywordDeleteSite::$site);
                $site->addParameter(new KeywordParameter($keywordRow->id));
                $row->addIconSite($site);


            }


        }


        /*

        $h1=new H1($layout->col1);
        $h1->content = 'Welcome';
*/


        //new LoginWidget($layout->col2);

        return parent::getContent();

    }
}