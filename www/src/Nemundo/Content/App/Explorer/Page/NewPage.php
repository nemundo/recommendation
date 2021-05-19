<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\NewSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Index\Log\Event\LogContentEvent;
use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Event\TreeEvent;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class NewPage extends ExplorerTemplate
{

    public function getContent()
    {

        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->exists()) {

            $contentType = $contentTypeParameter->getContentType();

            $contentParamter = new ContentParameter();
            $content = $contentParamter->getContent(false);
            /*if ($contentParamter->hasValue()) {
                $content = $contentParamter->getContentType(false);
            }*/

            //$contentType->addEvent(new LogContentEvent());

            $event=new TreeEvent();
            $event->parentId=  $contentParamter->getValue();
            $contentType->addEvent($event);



            $breadcrumb = new TreeBreadcrumb($this);
            $breadcrumb->redirectSite = ExplorerSite::$site;
            $breadcrumb->addNonActiveParentContentType( $content);
            //$breadcrumb->addActiveItem('New');



            $layout = new BootstrapTwoColumnLayout($this);

            $widget = new AdminWidget($layout->col1);
            $widget->widgetTitle = $contentType->typeLabel;

            $container = new ContentTypeFormContainer($widget);
            $container->contentType = $contentType;
            $container->redirectSite = clone(ExplorerSite::$site);
            $container->redirectSite->addParameter($contentParamter);
            //$container->appendContentParameter=true;

        }

        return parent::getContent();

    }

}