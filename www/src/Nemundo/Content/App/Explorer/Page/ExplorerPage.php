<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Content\Action\EditContentAction;
use Nemundo\Content\App\ContentPrint\Site\ContentPrintSite;
use Nemundo\Content\App\Explorer\Site\ChildOrderSite;
use Nemundo\Content\App\Explorer\Site\ContentEditSite;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\App\PublicShare\Action\PublicShareAction;
use Nemundo\Content\App\PublicShare\Action\PublicShareView;
use Nemundo\Content\App\Share\Action\PrivateShare\PrivateShareAction;
use Nemundo\Content\App\Share\Action\PrivateShare\PrivateShareActionView;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Geo\Site\Kml\GeoIndexKmlSite;
use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Com\Table\ChildTreeTable;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ViewParameter;
use Nemundo\Html\Header\Title;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;


class ExplorerPage extends ExplorerTemplate
{

    public function getContent()
    {

        $contentType = (new ContentParameter())->getContent(false);

        $title = new Title($this);
        $title->content = $contentType->getSubject();

        $breadcrumb = new TreeBreadcrumb($this);
        $breadcrumb->redirectSite = ExplorerSite::$site;
        $breadcrumb->addActiveParentContentType($contentType);


        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;


        if ($contentType->hasView()) {

            $widget = new ContentWidget($layout->col1);
            $widget->contentType = $contentType;
            $widget->viewId = (new ViewParameter())->getValue();
            $widget->redirectSite = ExplorerSite::$site;
            $widget->loadAction = false;
            //$widget->showMenu=false;


            $site = clone(ContentEditSite::$site);
            $site->addParameter(new ContentParameter());
            $widget->actionDropdown->addSite($site);


            $site = clone(ChildOrderSite::$site);
            $site->addParameter(new ContentParameter());
            $widget->actionDropdown->addSite($site);


            $site = clone(ContentPrintSite::$site);
            $site->addParameter(new ContentParameter());
            $widget->actionDropdown->addSite($site);

            $widget->actionDropdown->addContentAction(new PublicShareAction());
            $widget->actionDropdown->addContentAction(new PrivateShareAction());
            $widget->actionDropdown->addContentAction(new EditContentAction());



            if ($contentType->isObjectOfTrait(GeoIndexTrait::class)) {
                $site = clone(GeoIndexKmlSite::$site);
                $site->addParameter(new ContentParameter());
                $widget->actionDropdown->addSite($site);
            }


            $widget->actionDropdown->addSeperator();

            /*
            $site = clone(TreeConfigSite::$site);
            $site->addParameter(new ContentTypeParameter($contentType->typeId));
            $widget->actionDropdown->addSite($site);
*/


            /*
            $site = clone(PublicShareSiContentPrintSite::$site);
            $site->addParameter(new ContentParameter());
            $widget->actionDropdown->addSite($site);
*/


            /*
            $site = clone(ViewEditSite::$site);
            $site->addParameter(new TreeParameter($tre));
            $widget->actionDropdown->addSite($site);
*/


            /*
            $div = new BootstrapThreeColumnLayout($widget);
            $div->col1->columnWidth = 1;
            $div->col2->columnWidth = 1;
            $div->col3->columnWidth = 2;
*/

            /*
            $dropdown=new RestrictedContentTypeDropdown($div->col1);
            $dropdown->redirectSite = clone(NewSite::$site);
            $dropdown->redirectSite->addParameter(new ContentParameter());
            $dropdown->contentTypeId = $contentType->typeId;*/

        }


       /* $container = new ChildTreeTable($layout->col2);
        $container->contentType = $contentType;
        $container->redirectSite = ExplorerSite::$site;*/


        $container = new PublicShareView($layout->col2);
        $container->contentType = $contentType;


        $container = new PrivateShareActionView($layout->col2);
        $container->contentType = $contentType;




        return parent::getContent();

    }

}