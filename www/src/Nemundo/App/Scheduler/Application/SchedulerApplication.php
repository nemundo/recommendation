<?php

namespace Nemundo\App\Scheduler\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Scheduler\Data\SchedulerModelCollection;
use Nemundo\App\Scheduler\Install\SchedulerInstall;
use Nemundo\App\Scheduler\Install\SchedulerUninstall;
use Nemundo\App\Scheduler\Site\SchedulerSite;
use Nemundo\FrameworkProject;

class SchedulerApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->project = new FrameworkProject();
        $this->application = 'Scheduler';
        $this->applicationId = 'b83a0976-d01a-4e70-9247-a721ca5e1fca';
        $this->modelCollectionClass = SchedulerModelCollection::class;
        $this->installClass = SchedulerInstall::class;
        $this->uninstallClass = SchedulerUninstall::class;
        $this->adminSiteClass = SchedulerSite::class;

    }

}