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
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class JobUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new SchedulerSetup(new JobApplication()))
            ->removeScheduler(new JobScheduler());

        (new ScriptSetup())
            ->removeScript(new JobCleanScript());

        (new ModelCollectionSetup())
            ->removeCollection(new JobModelCollection());
        

    }
}