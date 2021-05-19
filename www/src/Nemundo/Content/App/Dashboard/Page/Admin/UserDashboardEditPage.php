<?php


namespace Nemundo\Content\App\Dashboard\Page\Admin;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Action\EditContentAction;
use Nemundo\Content\App\Dashboard\Com\Form\DashboardSearchForm;
use Nemundo\Content\App\Dashboard\Com\ListBox\UserDashboardListBox;
use Nemundo\Content\App\Dashboard\Content\UserDashboard\UserDashboardContentType;
use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboard;
use Nemundo\Content\App\Dashboard\Parameter\UserDashboardParameter;

use Nemundo\Content\App\Dashboard\Site\Admin\DashboardEditSite;
use Nemundo\Content\App\Dashboard\Site\Admin\UserDashboardEditSite;
use Nemundo\Content\Com\Container\ContentTypeChildAdminContainer;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Com\Table\ChildTreeTable;
use Nemundo\Content\Index\Tree\Site\Sortable\ContentSortableSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Header\Title;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;


class UserDashboardEditPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $userDashboardId=(new UserDashboardParameter())->getValue();
        $content = (new UserDashboardContentType($userDashboardId));  // (new ContentParameter())->getContent(false);

        $title = new Title($this);
        $title->content = $content->getSubject();

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;

        if ($content->hasView()) {

            $breadcrumb = new TreeBreadcrumb($layout->col1);
            $breadcrumb->redirectSite = UserDashboardEditSite::$site;
            $breadcrumb->redirectSite->addParameter(new UserDashboardParameter());
            $breadcrumb->addActiveParentContentType($content);

            $card = new ContentWidget($layout->col1);
            $card->contentType = $content;

            $card->addContentAction(new EditContentAction());

            $site = clone(ContentSortableSite::$site);
            $site->addParameter(new ContentParameter($content->getContentId()));
            $card->actionDropdown->addSite($site);

        }

        $table = new ChildTreeTable($layout->col2);
        $table->contentType = $content;
        $table->redirectSite = UserDashboardEditSite::$site;
        $table->redirectSite->addParameter(new UserDashboardParameter());


        /*
        $layout=new BootstrapTwoColumnLayout($this);

        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;

        new DashboardSearchForm($layout->col1);


        $widget=new AdminWidget($layout->col2);
        $widget->widgetTitle = 'New Dashboard';

        (new UserDashboardContentType())->getDefaultForm($widget);

        $userDashboardParameter = new UserDashboardParameter();
        if ($userDashboardParameter->hasValue()) {

            $contentType = new UserDashboardContentType($userDashboardParameter->getValue());
            //$contentType->getDefaultForm($layout->col2);

            $container = new ContentTypeChildAdminContainer($layout->col1);
            $container->contentType = $contentType;
            $container->redirectSite = clone(UserDashboardEditSite::$site);
            $container->redirectSite->addParameter(new UserDashboardParameter());


        }*/

        return parent::getContent();

    }

}