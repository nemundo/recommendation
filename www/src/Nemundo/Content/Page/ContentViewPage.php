<?php


namespace Nemundo\Content\Page;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Data\ContentAction\ContentActionReader;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ViewParameter;
use Nemundo\Content\Site\ContentViewSite;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class ContentViewPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $contentType = (new ContentParameter())->getContent(false);

        $breadcrumb = new TreeBreadcrumb($layout->col1);
        $breadcrumb->redirectSite = ContentViewSite::$site;
        $breadcrumb->addParentContentType($contentType);
        $breadcrumb->addContentType($contentType);

        $widget = new ContentWidget($layout->col1);
        $widget->contentType = $contentType;
        $widget->viewId = (new ViewParameter())->getValue();
        //$widget->loadAction = true;
        $widget->editable=true;
        $widget->redirectSite = ContentViewSite::$site;




        /*
        $container = new TreeIndexContainer($layout->col2);
        $container->contentType = $contentType;
        $container->redirectSite= ContentViewSite::$site;*/


        $reader = new ContentActionReader();
        $reader->model->loadContentType();
        $reader->addOrder($reader->model->contentType->contentType);

        // sort nach action label

        foreach ($reader->getData() as $actionRow) {
            //$this->addContentAction($actionRow->contentType->getContentType());

            /** @var AbstractContentAction $actionContentType */
            $actionContentType = $actionRow->contentType->getContentType();

            if ($actionContentType->hasView()) {

                // (new Debug())->write('action');


                $actionContentType->actionContentId = $contentType->getContentId();

                $widget->addContentAction($actionContentType);

                /*
                $widget = new AdminWidget($layout->col2);
                $widget->widgetTitle = $actionContentType->typeLabel;

                $view = $actionContentType->getDefaultView($widget);
                $view->redirectSite = ContentViewSite::$site;
*/


            }

        }

        return parent::getContent();

    }

}