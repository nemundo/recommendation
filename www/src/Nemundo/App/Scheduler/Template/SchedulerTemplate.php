<?php


namespace Nemundo\App\Scheduler\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\Scheduler\Site\SchedulerSite;
use Nemundo\Com\Template\AbstractTemplateDocument;

class SchedulerTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = SchedulerSite::$site;

    }

}