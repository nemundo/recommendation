<?php

namespace Nemundo\Content\Index\Tree\Page;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\Mobile\ExplorerMobileSite;
use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Index\Log\Event\LogContentEvent;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Event\TreeEvent;
use Nemundo\Content\Index\Tree\Site\TreeSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class TreeNewPage extends AbstractTemplateDocument
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

            $contentType->addEvent(new LogContentEvent());

            $event = new TreeEvent();
            $event->parentId = $contentParamter->getValue();
            $contentType->addEvent($event);


            /*$breadcrumb = new TreeBreadcrumb($this);
            $breadcrumb->redirectSite = ExplorerSite::$site;
            $breadcrumb->addNonActiveParentContentType($content);*/
            //$breadcrumb->addActiveItem('New');


            //$layout = new BootstrapTwoColumnLayout($this);

            //$widget = new AdminWidget($layout->col1);
            //$widget->widgetTitle = $contentType->typeLabel;

            $container = new ContentTypeFormContainer($this);
            $container->contentType = $contentType;
            $container->redirectSite = clone(TreeSite::$site);  //ExplorerMobileSite::$site);
            $container->redirectSite->addParameter($contentParamter);
            //$container->appendContentParameter=true;

        }


        return parent::getContent();
    }
}