<?php


namespace Nemundo\App\Backup\Path;


class DumpBackupPath extends BackupPath
{

    protected function loadPath()
    {

        parent::loadPath();
        $this->addPath('dump');

    }

}