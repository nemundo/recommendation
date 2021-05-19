<?php

namespace Nemundo\App\Help\Page;

use Nemundo\App\Help\Com\ListBox\ProjectListBox;
use Nemundo\App\Help\Data\Code\CodeReader;
use Nemundo\App\Help\Data\Topic\TopicReader;
use Nemundo\App\Help\Parameter\ProjectParameter;
use Nemundo\App\Help\Parameter\TopicParameter;
use Nemundo\App\Help\Site\HelpSite;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Html\Heading\H1;
use Nemundo\Html\Heading\H3;
use Nemundo\Html\Typography\Code;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Package\HighlightJs\HighlightJs;

class HelpPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $search = new SearchForm($this);

        $row = new BootstrapRow($search);

        $project = new ProjectListBox($row);
        $project->column = true;
        $project->columnSize = 2;
        $project->submitOnChange = true;
        $project->searchMode = true;


        if ($project->hasValue()) {

            $layout = new BootstrapTwoColumnLayout($this);
            $layout->col1->columnWidth = 2;
            $layout->col2->columnWidth = 10;


            $list = new BootstrapSiteList($layout->col1);

            $topicReader = new TopicReader();
            $topicReader->filter->andEqual($topicReader->model->projectId, $project->getValue());
            $topicReader->addOrder($topicReader->model->topic);
            foreach ($topicReader->getData() as $topicRow) {

                $site = clone(HelpSite::$site);
                $site->title = $topicRow->topic;
                $site->addParameter(new ProjectParameter());
                $site->addParameter(new TopicParameter($topicRow->id));

                $list->addSite($site);

            }

            $topicParameter=new TopicParameter();
            if ($topicParameter->hasValue()) {

                $topicRow = (new TopicReader())->getRowById($topicParameter->getValue());

                $h1=new H1($layout->col2);
                $h1->content=$topicRow->topic;

                $codeReader=new CodeReader();
                $codeReader->filter->andEqual($codeReader->model->topicId,$topicRow->id);
                $codeReader->addOrder($codeReader->model->title);
                foreach ($codeReader->getData() as $codeRow) {

                    $h3=new H3($layout->col2);
                    $h3->content = $codeRow->title;

                    /*$code = new Code($layout->col2);
                    $code->content = (new Html($codeRow->code))->getValue();*/

                    $code = new HighlightJs($layout->col2);
                    $code->language = 'php';
                    $code->code =$codeRow->code;


                }




            }



        }


        return parent::getContent();
    }
}