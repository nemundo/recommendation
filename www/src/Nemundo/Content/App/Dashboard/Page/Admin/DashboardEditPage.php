<?php


namespace Nemundo\Content\App\Dashboard\Page\Admin;


use Nemundo\Content\Action\EditContentAction;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardAdminSite;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardEditSite;
use Nemundo\Content\App\Dashboard\Template\DashboardAdminTemplate;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Com\Table\ChildTreeTable;
use Nemundo\Content\Index\Tree\Site\Sortable\ContentSortableSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Header\Title;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;


class DashboardEditPage extends DashboardAdminTemplate
{

    public function getContent()
    {

        DashboardAdminSite::$site->showMenuAsActive = true;

        $content = (new ContentParameter())->getContent(false);

        $title = new Title($this);
        $title->content = $content->getSubject();

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;

        if ($content->hasView()) {

            $breadcrumb = new TreeBreadcrumb($layout->col1);
            $breadcrumb->redirectSite = DashboardEditSite::$site;
            $breadcrumb->addActiveParentContentType($content);

            $widget = new ContentWidget($layout->col1);
            $widget->contentType = $content;

            $widget->actionDropdown->addContentAction(new EditContentAction());

            $site = clone(ContentSortableSite::$site);
            $site->addParameter(new ContentParameter($content->getContentId()));
            $widget->actionDropdown->addSite($site);

        }

        $table = new ChildTreeTable($layout->col2);
        $table->contentType = $content;
        $table->redirectSite = DashboardEditSite::$site;

        return parent::getContent();

    }

}