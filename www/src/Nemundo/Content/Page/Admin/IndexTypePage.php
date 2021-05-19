<?php

namespace Nemundo\Content\Page\Admin;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Data\IndexType\IndexTypeReader;
use Nemundo\Content\Template\ContentAdminTemplate;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class IndexTypePage extends ContentAdminTemplate
{
    public function getContent()
    {


        $table=new AdminTable($this);

        $header=new AdminTableHeader($table);
        $header->addText('Id');
        $header->addText('Index Type');

        $reader = new IndexTypeReader();
        foreach ($reader->getData() as $indexTypeRow) {

            $row=new AdminTableRow($table);
            $row->addText($indexTypeRow->id);
            $row->addText($indexTypeRow->indexType);

        }


        return parent::getContent();
    }
}