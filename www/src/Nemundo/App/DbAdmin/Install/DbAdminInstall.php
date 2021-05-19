<?php

namespace Nemundo\App\DbAdmin\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\DbAdmin\Application\DbAdminApplication;
use Nemundo\App\DbAdmin\Scheduler\MySqlDumpScheduler;
use Nemundo\App\DbAdmin\Script\DbIndexDeleteScript;
use Nemundo\App\DbAdmin\Script\MySqlTmpRestoreScript;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;

class DbAdminInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new DbAdminApplication());

        (new SchedulerSetup(new DbAdminApplication()))
            ->addScheduler(new MySqlDumpScheduler());

        $setup = new ScriptSetup();
        $setup->addScript(new DbIndexDeleteScript());
        $setup->addScript(new MySqlTmpRestoreScript());

    }
}
