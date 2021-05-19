<?php

namespace Hackathon\Page;

use Hackathon\Com\ListBox\NewsTypeListBox;
use Hackathon\Data\NewsIndex\NewsIndexPaginationReader;
use Hackathon\Data\SourceIndex\SourceIndexReader;
use Hackathon\Parameter\SourceParameter;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Web\Site\Site;

class SourcePage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $newsType = new NewsTypeListBox($formRow);
        $newsType->column = true;
        $newsType->columnSize = 2;
        $newsType->searchMode = true;
        $newsType->submitOnChange = true;


        if ($newsType->hasValue()) {

            $layout = new BootstrapTwoColumnLayout($this);
            $layout->col1->columnWidth = 2;
            $layout->col2->columnWidth = 10;


            $list = new BootstrapSiteList($layout->col1);

            $sourceReader = new SourceIndexReader();

            if ($newsType->hasValue()) {
                $sourceReader->filter->andEqual($sourceReader->model->newsTypeId, $newsType->getValue());
            }

            foreach ($sourceReader->getData() as $sourceIndexRow) {


                $site = new Site();
                $site->title = $sourceIndexRow->source;
                $site->addParameter(new SourceParameter($sourceIndexRow->id));
                $list->addSite($site);


            }


            $table = new AdminTable($layout->col2);

            $newsReader = new NewsIndexPaginationReader();
            $newsReader->model->loadNewsType()->newsType->loadContentType();

            $parameter = new SourceParameter();
            if ($parameter->hasValue()) {
                $newsReader->filter->andEqual($newsReader->model->sourceId, $parameter->getValue());
            }

            if ($newsType->hasValue()) {
                $newsReader->filter->andEqual($newsReader->model->newsTypeId, $newsType->getValue());
            }

            foreach ($newsReader->getData() as $newsIndexRow) {

                $row = new TableRow($table);
                //$row->addText($newsIndexRow->newsType->contentType->contentType, true);
                //$row->addHyperlink($newsIndexRow->url, $newsIndexRow->title, true);


                $div = new Div($row);
                $hyperlink = new UrlHyperlink($div);
                $hyperlink->content = $newsIndexRow->title;
                $hyperlink->url = $newsIndexRow->url;
                $hyperlink->openNewWindow=true;

                $p = new Paragraph($div);
                $p->content = $newsIndexRow->description;


                //$row->addText($newsIndexRow->description);

                /*
                $row->addText($newsIndexRow->title);
                $row->addText($newsIndexRow->url);*/

            }

            $pagination = new BootstrapPagination($layout->col2);
            $pagination->paginationReader = $newsReader;

            //}

        }

        return parent::getContent();
    }
}