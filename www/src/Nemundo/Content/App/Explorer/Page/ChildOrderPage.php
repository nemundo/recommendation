<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\App\Explorer\Site\ChildOrderSite;
use Nemundo\Content\App\Explorer\Site\ContentEditSite;
use Nemundo\Content\App\Explorer\Site\ContentRemoveSite;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Parameter\ParentParameter;
use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\Index\Tree\Site\Sortable\ContentSortableJsonSite;
use Nemundo\Content\Index\Tree\Site\Sortable\ContentSortableSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Block\Div;
use Nemundo\Package\Bootstrap\Button\BootstrapSiteButton;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\JqueryUi\Sortable\JquerySortable;

class ChildOrderPage extends ExplorerTemplate
{

    public function getContent()
    {

        $contentParameter = new ContentParameter();
        $contentParameter->contentTypeCheck = false;
        $contentType = $contentParameter->getContent();

        $breadcrumb = new TreeBreadcrumb($this);
        $breadcrumb->redirectSite = ExplorerSite::$site;
        $breadcrumb->addParentContentType($contentType);
        $breadcrumb->addContentType($contentType);
        $breadcrumb->addActiveItem(ChildOrderSite::$site->title);

        $btn = new BootstrapSiteButton($this);
        $btn->site = clone(ExplorerSite::$site);
        $btn->site->addParameter($contentParameter);
        $btn->site->title = 'Back';

        $layout = new BootstrapTwoColumnLayout($this);

        $sortableDiv = new JquerySortable($layout->col1);
        $sortableDiv->id = 'cms_sortable_';
        $sortableDiv->sortableSite = ContentSortableJsonSite::$site;  // ContentSortableSite::$site;

        $reader = new ChildContentReader();
        $reader->contentType = $contentType;
        foreach ($reader->getData() as $treeRow) {

            $itemDiv = new AdminWidget($sortableDiv);
            $itemDiv->id = 'item_' . $treeRow->id;
            $itemDiv->widgetTitle = $treeRow->child->subject;

            $div = new Div($itemDiv);
            $treeRow->child->getContentType()->getDefaultView($div);

            $div = new Div($itemDiv);

            $btn = new AdminIconSiteButton($div);
            $btn->site = clone(ContentRemoveSite::$site);
            $btn->site->addParameter(new ParentParameter($contentType->getContentId()));
            $btn->site->addParameter(new ContentParameter($treeRow->id));

            $btn = new AdminIconSiteButton($div);
            $btn->site = clone(ContentEditSite::$site);
            $btn->site->addParameter(new ContentParameter($treeRow->id));

        }

        return parent::getContent();

    }

}