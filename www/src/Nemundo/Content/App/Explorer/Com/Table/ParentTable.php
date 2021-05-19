<?php


namespace Nemundo\Content\App\Explorer\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\Index\Tree\Type\AbstractContentType;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Package\Bootstrap\Table\BootstrapTable;

class ParentTable extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    public function getContent()
    {


        // parent
        if ($this->contentType->hasParent()) {




            $subtitle = new AdminSubtitle($this);
            $subtitle->content = 'Parent Type';

            $table = new AdminClickableTable($this);

            $header=new TableHeader($table);
            $header->addText('Content Type');
            $header->addText('Subject');

            foreach ($this->contentType->getParentContent() as $contentRow) {

                $row = new BootstrapClickableTableRow($table);

                $parentContentType = $contentRow->getContentType();
                $row->addText($parentContentType->typeLabel);

                $row->addText($parentContentType->getSubject());
                $site = clone(ItemSite::$site);  // clone(ExplorerSite::$site);
                $site->addParameter(new ContentParameter($contentRow->id));
                $row->addClickableSite($site);

            }

        }
        
        return parent::getContent();

    }

}