<?php

namespace Nemundo\App\Scheduler\Com\Navigation;


use Nemundo\App\Scheduler\Site\LogSite;
use Nemundo\App\Scheduler\Site\SchedulerRunningSite;
use Nemundo\App\Scheduler\Site\SchedulerSite;
use Nemundo\Package\Bootstrap\Tabs\BootstrapTabs;

class SchedulerNavigation extends BootstrapTabs
{


    public function getContent()
    {

        $this->addSite(SchedulerSite::$site);
        $this->addSite(LogSite::$site);
        $this->addSite(SchedulerRunningSite::$site);

        return parent::getContent();

    }

}