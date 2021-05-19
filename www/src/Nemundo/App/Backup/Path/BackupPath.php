<?php


namespace Nemundo\App\Backup\Path;


use Nemundo\Project\Path\ProjectPath;

class BackupPath extends ProjectPath
{

    protected function loadPath()
    {

        parent::loadPath();
        $this->addPath('backup');

    }

}