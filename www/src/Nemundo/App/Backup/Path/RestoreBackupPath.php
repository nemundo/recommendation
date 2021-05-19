<?php


namespace Nemundo\App\Backup\Path;


class RestoreBackupPath extends BackupPath
{

    protected function loadPath()
    {

        parent::loadPath();
        $this->addPath('restore');

    }

}