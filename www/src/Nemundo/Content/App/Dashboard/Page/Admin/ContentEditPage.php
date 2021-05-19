<?php

namespace Nemundo\Content\App\Dashboard\Page\Edit;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Admin\Site\ContentItemSite;
use Nemundo\Content\App\Dashboard\Site\Edit\DashboardEditSite;
use Nemundo\Content\App\Explorer\Com\Breadcrumb\ExplorerTreeBreadcrumb;
use Nemundo\Content\App\Explorer\Parameter\RefererContentParameter;
use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;

use Nemundo\Content\Index\Log\Event\LogContentEvent;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Type\TreeIndexTrait;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class ContentEditPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $contentParameter=new ContentParameter();
        $contentParameter->contentTypeCheck=false;
        $content = $contentParameter->getContent();
        //$content->addEvent(new LogContentEvent());

        /*
        if ($contentType->isObjectOfTrait(TreeIndexTrait::class)) {
            $breadcrumb = new TreeBreadcrumb($this);
            $breadcrumb->redirectSite = ExplorerSite::$site;  //ItemSite::$site;
            $breadcrumb->addParentContentType($contentType);
            $breadcrumb->addContentType($contentType);
            $breadcrumb->addActiveItem('Edit');
        }*/

        $layout=new BootstrapTwoColumnLayout($this);

        $widget= new AdminWidget($layout->col1);
        $widget->widgetTitle=$content->getSubject();

        $form = $content->getDefaultForm($widget);
        $form->redirectSite = clone(DashboardEditSite::$site);
        $form->appendContentParameter=true;
        //$form->redirectSite->addParameter(new ContentParameter((new RefererContentParameter())->getValue()));

        return parent::getContent();

    }

}