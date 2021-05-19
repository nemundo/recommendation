<?php


namespace Nemundo\App\Backup\Install;


use Nemundo\App\Backup\Application\BackupApplication;
use Nemundo\App\Backup\Path\DumpBackupPath;
use Nemundo\App\Backup\Path\RestoreBackupPath;
use Nemundo\App\Backup\Scheduler\BackupDumpScheduler;
use Nemundo\App\Backup\Script\BackupCleanScript;
use Nemundo\App\Backup\Script\DumpRestoreScript;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class BackupInstall extends AbstractInstall
{

    public function install()
    {

        (new DumpBackupPath())->createPath();
        (new RestoreBackupPath())->createPath();

        (new SchedulerSetup(new BackupApplication()))
            ->addScheduler(new BackupDumpScheduler());

        (new ScriptSetup(new BackupApplication()))
            ->addScript(new DumpRestoreScript())
            ->addScript(new BackupCleanScript());

    }

}