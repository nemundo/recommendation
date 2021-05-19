<?php

namespace Nemundo\Content\App\File\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;


use Nemundo\Content\App\File\Data\Document\DocumentPaginationReader;
use Nemundo\Content\App\File\Template\FileTemplate;
use Nemundo\Html\Block\Div;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\Site;

class FilePage extends FileTemplate
{

    public function getContent()
    {


        /*
        $layout = new BootstrapTwoColumnLayout($this);

        $documentReader = new DocumentPaginationReader();
        //$documentReader->model->loadDocumentType();
        //$documentReader->model->documentType->loadContentType();
        //$documentReader->model->loadContent();
        //$documentReader->model->content->loadContentType();

        /*
        if ($listbox->hasValue()) {
            $documentReader->filter->andEqual($documentReader->model->content->contentTypeId, $listbox->getValue());
        }*/


        //$documentReader->addOrder($documentReader->model->title);
        //$documentReader->paginationLimit = 50;  // ProcessConfig::PAGINATION_LIMIT;

/*
        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        //$header->addText($documentReader->model->title->label);
        $header->addText($documentReader->model->document->label);
        //$header->addText($documentReader->model->documentType->label);

        foreach ($documentReader->getData() as $documentRow) {

            $row = new BootstrapClickableTableRow($table);


            /*
            if ($documentRow->contentId == (new ContentParameter())->getValue()) {
                $row->addCssClass('table-active');
            }*/

            //$row->addText($documentRow->title);
            //$row->addYesNo($documentRow->closed);
         /*   $row->addText($documentRow->document->getFilename());  //YtesNo($documentRow->closed);
            //$row->addClickableSite($documentRow->file->get)
            $row->addClickableUrl($documentRow->document->getUrl());


            /*$site = new Site();
            $site->addParameter(new DocumentParameter($documentRow->id));
            $row->addClickableSite($site);
            //$row->addClickableSite($contentType->getViewSite());

            //$row->addText($documentRow->documentType->contentType);
            //$row->addText($documentRow->content->dateTime->getShortDateTimeLeadingZeroFormat());*/
            //$contentType = $documentRow->content->getContentType();

     //   }




        /*
        $parameter=new DocumentParameter();
        if ($parameter->hasValue()) {

            $contentType=$parameter->getContentType();
            $documentRow=$contentType->getDataRow();

            $div=new Div($layout->col2);
            $div->content=$documentRow->text;

        }






        /*          $site =new Site();  // clone(DocumentSite::$site);
                  $site->addParameter(new ContentParameter($documentRow->contentId));
                  $row->addClickableSite($site);
                  //$row->addClickableSite($contentType->getViewSite());

              }

              $pagination = new BootstrapPagination($page);
              $pagination->paginationReader = $documentReader;


              $contentParameter=new ContentParameter();
              $contentParameter->contentTypeCheck=false;
              if ($contentParameter->exists()) {

                  $contentType= $contentParameter->getContentType();

                  $subtitle=new AdminSubtitle($layout->col2);
                  $subtitle->content = $contentType->getSubject();

                  $contentType->getView($layout->col2);




                  $table = new ContentChildContainer($layout->col2);
                  $table->contentType=$contentType;


                  $btn = new AdminSiteButton($layout->col2);
                  $btn->site = $contentType->getSubjectViewSite();


                  // share
                  // favorite
                  // open


              }*/


        return parent::getContent();
    }
}