<?php


namespace Nemundo\Content\App\Notification\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Notification\Site\NotificationSite;

class NotificationTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = NotificationSite::$site;

    }

}