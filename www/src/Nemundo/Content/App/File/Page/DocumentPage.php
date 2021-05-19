<?php

namespace Nemundo\Content\App\File\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\File\Content\Document\DocumentContentType;
use Nemundo\Content\App\File\Data\Document\DocumentPaginationReader;
use Nemundo\Content\App\File\Template\FileTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class DocumentPage extends FileTemplate  // AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        (new DocumentContentType())->getDefaultForm($layout->col2);

        $documentReader = new DocumentPaginationReader();

        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText($documentReader->model->document->label);

        foreach ($documentReader->getData() as $documentRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($documentRow->document->getFilename());
            $row->addClickableUrl($documentRow->document->getUrl());

        }


        return parent::getContent();
    }
}