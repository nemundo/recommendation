<?php

namespace Nemundo\Content\App\File\Content\File;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\File\Content\File\AbstractFileContentForm;
use Nemundo\Content\App\File\Data\Document\DocumentPaginationReader;
use Nemundo\Content\App\File\Data\Document\DocumentReader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class FileContentForm extends AbstractFileContentForm
{
    /**
     * @var FileContentType
     */
    //public $contentType;

    /*public function getContent()
    {



/*

        $documentReader =new DocumentReader();


        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText($documentReader->model->document->label);
        //$header->addText($documentReader->model->documentType->label);

        foreach ($documentReader->getData() as $documentRow) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText($documentRow->document->getFilename());
            $row->addClickableUrl($documentRow->document->getUrl());




            /*$site = new Site();
            $site->addParameter(new DocumentParameter($documentRow->id));
            $row->addClickableSite($site);
            //$row->addClickableSite($contentType->getViewSite());

            //$row->addText($documentRow->documentType->contentType);
            //$row->addText($documentRow->content->dateTime->getShortDateTimeLeadingZeroFormat());*/
            //$contentType = $documentRow->content->getContentType();

      //  }




     /*   return parent::getContent();
    }*/


}