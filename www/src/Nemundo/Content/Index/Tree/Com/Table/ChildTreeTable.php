<?php


namespace Nemundo\Content\Index\Tree\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;


use Nemundo\Content\Com\Container\AbstractContentTypeContainer;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\Index\Tree\Reader\ChildContentTypeReader;
use Nemundo\Content\Index\Tree\Site\ChildDeleteSite;
use Nemundo\Content\Index\Tree\Site\ViewEditSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Site\ContentEditSite;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;


class ChildTreeTable extends AbstractContentTypeContainer
{

    public function getContent()
    {

        $table = new AdminClickableTable($this);

        $header = new AdminTableHeader($table);
        $header->addText('Child');
        $header->addText('Typ');
        $header->addText('View');
        $header->addEmpty();
        $header->addEmpty();

        $reader = new ChildContentReader();
        $reader->contentType = $this->contentType;
        foreach ($reader->getData() as $treeRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($treeRow->child->subject);
            $row->addText($treeRow->child->contentType->contentType);
            //$row->addText($treeRow->view->viewName);


            $site = clone(ViewEditSite::$site);
            $site->title = $treeRow->view->viewName;
            $site->addParameter(new TreeParameter($treeRow->id));
            $site->addParameter(new ContentParameter());
            $row->addSite($site);


            $site = clone(ContentEditSite::$site);
            $site->addParameter(new ContentParameter($treeRow->childId));
            $row->addIconSite($site);

            $site = clone(ChildDeleteSite::$site);
            $site->addParameter(new TreeParameter($treeRow->id));
            $row->addIconSite($site);

            $site = clone($this->redirectSite);
            $site->addParameter(new ContentParameter($treeRow->childId));
            $row->addClickableSite($site);


        }



        return parent::getContent();

    }

}