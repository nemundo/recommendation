<?php


namespace Nemundo\Content\Index\Tree\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Com\Container\AbstractContentTypeContainer;
use Nemundo\Content\Index\Tree\Reader\ParentContentTypeReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;


class ParentTreeTable extends AbstractContentTypeContainer
{

    public function getContent()
    {

        $table = new AdminClickableTable($this);

        $header = new AdminTableHeader($table);
        $header->addText('Parent');
        $header->addText('Typ');

        $reader = new ParentContentTypeReader();
        $reader->contentType = $this->contentType;
        foreach ($reader->getData() as $contentType) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($contentType->getSubject());
            $row->addText($contentType->typeLabel);

            $site = clone($this->redirectSite);
            $site->addParameter(new ContentParameter($contentType->getContentId()));
            $row->addClickableSite($site);

        }

        return parent::getContent();

    }

}