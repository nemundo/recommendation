<?php

namespace Nemundo\Content\App\Dashboard\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardAdminSite;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardEditSite;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;

class DashboardAdminTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = DashboardAdminSite::$site;

    }

}