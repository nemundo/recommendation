<?php

namespace Nemundo\Content\App\Explorer\Content\Container\View;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Explorer\Parameter\RefererContentParameter;
use Nemundo\Content\App\Explorer\Site\ContentEditSite;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\Index\Tree\Site\ContentRemoveFromTreeSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class ContainerContentView extends AbstractContainerContentView
{

    protected function loadView()
    {

        $this->viewName = 'List';
        $this->viewId = '54286060-68a1-4a40-a9be-a52144e77cdb';
        $this->defaultView = true;

    }


    public function getContent()
    {

        $p = new Paragraph($this);
        $p->content = (new Html($this->contentType->getDataRow()->description))->getValue();

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('Subject');
        $header->addText('Type');
        $header->addEmpty();
        $header->addEmpty();

        $reader = new ChildContentReader();
        $reader->contentType = $this->contentType;
        foreach ($reader->getData() as $contentRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($contentRow->child->subject);
            $row->addText($contentRow->child->contentType->contentType);

            $site = clone(ContentEditSite::$site);
            $site->addParameter(new ContentParameter($contentRow->childId));
            $row->addIconSite($site);

            $site = clone(ContentRemoveFromTreeSite::$site);
            $site->addParameter(new TreeParameter($contentRow->id));
            $site->addParameter(new RefererContentParameter($this->contentType->getContentId()));
            $row->addIconSite($site);

            if ($this->redirectSite !== null) {
                $site = clone($this->redirectSite);
                $site->addParameter(new ContentParameter($contentRow->childId));
                $row->addClickableSite($site);
            } else {
                (new LogMessage())->writeError('ContainerContentView. No Redirect Site.');
            }

        }


        return parent::getContent();
    }
}