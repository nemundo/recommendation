<?php


namespace Nemundo\Content\App\Dashboard\Page\Edit;


use Nemundo\Admin\Com\Button\AdminCopyButton;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Calendar\Com\Container\CalendarContainer;
use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\App\Dashboard\Site\Edit\DashboardEditSite;
use Nemundo\Content\App\Explorer\Com\Dropdown\MenuDropdown;
use Nemundo\Content\App\Explorer\Data\PublicShare\PublicShareReader;
use Nemundo\Content\App\Explorer\Parameter\PublicShareParameter;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\NewSite;
use Nemundo\Content\App\Explorer\Site\_Share\PublicShareDeleteSite;
use Nemundo\Content\App\Explorer\Site\_Share\PublicShareSite;
use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Com\Input\ContentHiddenInput;
use Nemundo\Content\Com\ListBox\ContentViewListBox;
use Nemundo\Content\Index\Geo\Com\Container\GeoIndexContainer;
use Nemundo\Content\Index\Group\Com\Container\GroupContainer;
use Nemundo\Content\Index\Log\Com\Container\LogContainer;
use Nemundo\Content\Index\Log\Event\LogContentEvent;
use Nemundo\Content\Index\Relation\Com\Widget\RelationIndexWidget;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Index\Tree\Com\Dropdown\RestrictedContentTypeDropdown;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Index\Tree\Event\TreeEvent;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Db\Sql\Field\CountField;
use Nemundo\Html\Header\Title;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;


class ContentNewPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        // TreeContentNewEditContainer



        $contentTypeParameter = new ContentTypeParameter();
        //if ($contentTypeParameter->exists()) {

            $contentType = $contentTypeParameter->getContentType();
            $contentParamter = new ContentParameter();
            /*if ($contentParamter->hasValue()) {
                $content = $contentParamter->getContentType(false);
            }*/

            //$contentType->addEvent(new LogContentEvent());

            $event=new TreeEvent();
            $event->parentId=  $contentParamter->getValue();
            $contentType->addEvent($event);

            $layout = new BootstrapTwoColumnLayout($this);

            $widget = new AdminWidget($layout->col1);
            $widget->widgetTitle = $contentType->typeLabel;

            $container = new ContentTypeFormContainer($widget);
            $container->contentType = $contentType;
            $container->redirectSite = clone(DashboardEditSite::$site);
            $container->redirectSite->addParameter($contentParamter);


            //$container->appendContentParameter=true;

        //}



        return parent::getContent();

    }

}