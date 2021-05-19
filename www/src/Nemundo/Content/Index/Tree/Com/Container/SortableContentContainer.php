<?php


namespace Nemundo\Content\Index\Tree\Com\Container;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Content\App\Explorer\Site\ItemSite;

use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Index\Tree\Reader\ChildContentTypeReader;
use Nemundo\Content\Index\Tree\Site\ContentSortableSite;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Jumbotron\BootstrapJumbotron;
use Nemundo\Package\JqueryUi\Sortable\JquerySortable;
use Nemundo\Web\Site\AbstractSite;

class SortableContentContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var bool
     */
    public $showEditIcon = true;

    /**
     * @var bool
     */
    public $showRemoveIcon = true;

    /**
     * @var bool
     */
    public $showViewIcon = true;

    /**
     * @var AbstractSite
     */
    public $editRedirect;

    /**
     * @var AbstractSite
     */
    public $deleteRedirect;

    public function getContent()
    {

        $sortableDiv = new JquerySortable($this);
        $sortableDiv->id = 'cms_sortable_';
        $sortableDiv->sortableSite = ContentSortableSite::$site;


        $reader = new ChildContentTypeReader();
        $reader->contentType = $this->contentType;


        //foreach ($this->contentType->getChild() as $treeRow) {
        foreach ($reader->getTreeRowList() as $treeRow) {

            $itemDiv = new BootstrapJumbotron($sortableDiv);
            $itemDiv->id = 'item_' . $treeRow->id;
            //$itemDiv->id = 'item_' . $treeRow->id;

            //$childContentType = $treeRow->getContentType();

            $childContentType = $treeRow->child->getContentType();

            /*$p=new Paragraph($itemDiv);
            $p->content=$childContentType->getDefaultTreeViewId();*/

            $div = new Div($itemDiv);

            //$childContentType->getDefaultTreeView($div);

            //$view = new $treeRow->view->viewClass($div);
            //$childContentType->getDefaultTreeView($div);
            $childContentType->getDefaultView($div);

            //$view->contentType = $childContentType;



            $div = new Div($itemDiv);

            if ($this->showRemoveIcon) {
                $btn = new AdminIconSiteButton($div);
                $btn->site = clone($this->deleteRedirect);
                $btn->site->addParameter(new TreeParameter($treeRow->id));
            }

            if ($this->showEditIcon) {
                $btn = new AdminIconSiteButton($div);
                $btn->site = clone($this->editRedirect);
                $btn->site->addParameter(new ContentParameter($treeRow->childId));
            }

            if ($this->showViewIcon) {
                /*$btn = new AdminIconSiteButton($div);
                $btn->site = clone(ItemSite::$site);
                $btn->site->addParameter(new ContentParameter($treeRow->childId));*/
            }

            /*$form = new ContentViewChangeForm($div);
            $form->contentType = $childContentType;
            $form->treeId = $treeRow->id;*/

        }

        return parent::getContent();

    }

}