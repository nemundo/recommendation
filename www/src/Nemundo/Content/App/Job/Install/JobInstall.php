<?php

namespace Nemundo\Content\App\Job\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\Job\Application\JobApplication;
use Nemundo\Content\App\Job\Data\JobModelCollection;
use Nemundo\Content\App\Job\Scheduler\JobScheduler;
use Nemundo\Content\App\Job\Script\JobCleanScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class JobInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new JobApplication());

        (new ModelCollectionSetup())
            ->addCollection(new JobModelCollection());

        (new SchedulerSetup(new JobApplication()))
            ->addScheduler(new JobScheduler());

        (new ScriptSetup())
            ->addScript(new JobCleanScript());

        // Register Index



    }
}