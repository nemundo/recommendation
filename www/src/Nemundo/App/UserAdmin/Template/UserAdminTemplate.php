<?php

namespace Nemundo\App\UserAdmin\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\UserAdmin\Site\UserAdminSite;
use Nemundo\Com\Template\AbstractTemplateDocument;

class UserAdminTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = UserAdminSite::$site;

    }


}