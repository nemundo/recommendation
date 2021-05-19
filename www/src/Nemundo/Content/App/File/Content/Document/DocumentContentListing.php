<?php

namespace Nemundo\Content\App\File\Content\Document;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\File\Data\Document\DocumentPaginationReader;
use Nemundo\Content\View\AbstractContentListing;
use Nemundo\Core\File\FileSize;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class DocumentContentListing extends AbstractContentListing
{

    public function getContent()
    {

        $documentReader = new DocumentPaginationReader();

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText($documentReader->model->document->label);
        $header->addText($documentReader->model->document->fileSize->label);

        foreach ($documentReader->getData() as $documentRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($documentRow->document->getFilename());
            $row->addText( (new FileSize( $documentRow->document->getFileSize()))->getText());
                        $row->addClickableUrl($documentRow->document->getUrl());
        }

        return parent::getContent();

    }

}