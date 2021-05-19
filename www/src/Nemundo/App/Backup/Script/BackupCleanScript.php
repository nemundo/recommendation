<?php

namespace Nemundo\App\Backup\Script;


use Nemundo\App\Backup\Path\DumpBackupPath;
use Nemundo\App\Backup\Path\RestoreBackupPath;
use Nemundo\App\Script\Type\AbstractConsoleScript;


class BackupCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'backup-clean';
    }


    public function run()
    {

        (new DumpBackupPath())->emptyDirectory();
        (new RestoreBackupPath())->emptyDirectory();

    }

}