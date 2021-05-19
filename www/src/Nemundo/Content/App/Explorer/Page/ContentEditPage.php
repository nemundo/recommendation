<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\App\Explorer\Parameter\RefererContentParameter;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Index\Log\Event\LogContentEvent;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;


// EditPage
class ContentEditPage extends ExplorerTemplate
{

    public function getContent()
    {

        $contentParameter = new ContentParameter();
        $contentParameter->contentTypeCheck = false;
        $content = $contentParameter->getContent();
        //$content->addEvent(new LogContentEvent());

        //if ($content->isObjectOfTrait(TreeIndexTrait::class)) {
        $breadcrumb = new TreeBreadcrumb($this);
        $breadcrumb->redirectSite = ExplorerSite::$site;  //ItemSite::$site;
        //  $breadcrumb->addParentContentType($content);
        //$breadcrumb->contentType= $content;

        $breadcrumb->addContentType($content);
        $breadcrumb->addActiveItem('Edit');
        //}

        $layout = new BootstrapTwoColumnLayout($this);

        $widget = new AdminWidget($layout->col1);
        $widget->widgetTitle = $content->getSubject();

        $form = $content->getDefaultForm($widget);
        $form->redirectSite = clone(ExplorerSite::$site);
        $form->appendContentParameter = true;
        $form->redirectSite->addParameter(new ContentParameter((new RefererContentParameter())->getValue()));

        return parent::getContent();

    }

}