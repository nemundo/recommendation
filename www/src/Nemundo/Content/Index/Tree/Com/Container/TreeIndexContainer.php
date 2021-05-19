<?php


namespace Nemundo\Content\Index\Tree\Com\Container;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Com\Container\AbstractContentTypeContainer;
use Nemundo\Content\Index\Tree\Com\Table\ChildTreeTable;
use Nemundo\Content\Index\Tree\Com\Table\ParentTreeTable;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class TreeIndexContainer extends AbstractContentTypeContainer
{

    public function getContent()
    {

        $widget = new AdminWidget($this);
        $widget->widgetTitle = 'Tree';

        $table = new ParentTreeTable($widget);
        $table->contentType = $this->contentType;
        $table->redirectSite = $this->redirectSite;

        $table = new AdminClickableTable($widget);

        $header = new AdminTableHeader($table);
        $header->addText('Content');
        $header->addText('Typ');

        //$reader = new ParentContentTypeReader();
        //$reader->contentType = $this->contentType;
        //foreach ($reader->getData() as $contentType) {

        $row = new BootstrapClickableTableRow($table);
        $row->addText($this->contentType->getSubject());
        $row->addText($this->contentType->typeLabel);


        $site = clone($this->redirectSite);
        $site->addParameter(new ContentParameter($this->contentType->getContentId()));
        $row->addClickableSite($site);


        $table = new ChildTreeTable($widget);
        $table->contentType = $this->contentType;
        $table->redirectSite = $this->redirectSite;

        return parent::getContent();

    }

}