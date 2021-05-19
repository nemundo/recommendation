<?php

namespace Nemundo\App\MySql\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\MySql\Site\MySqlSite;
use Nemundo\App\MySql\Site\MySqlTableSite;
use Nemundo\App\Scheduler\Site\SchedulerSite;
use Nemundo\Com\Template\AbstractTemplateDocument;

class MySqlTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site = MySqlSite::$site;

    }

}