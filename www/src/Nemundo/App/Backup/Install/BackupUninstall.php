<?php


namespace Nemundo\App\Backup\Install;


use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\App\Backup\Scheduler\BackupDumpScheduler;
use Nemundo\App\Backup\Script\BackupCleanScript;
use Nemundo\App\Backup\Script\DumpRestoreScript;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;

class BackupUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new SchedulerSetup())
            ->removeScheduler(new BackupDumpScheduler());

        (new ScriptSetup())
            ->removeScript(new DumpRestoreScript())
            ->removeScript(new BackupCleanScript());

    }

}