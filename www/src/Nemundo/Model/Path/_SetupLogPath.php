<?php


namespace Nemundo\Model\Path;


use Nemundo\Project\Path\LogPath;

class SetupLogPath extends LogPath
{

    protected function loadPath()
    {
        parent::loadPath();
        $this->addPath('setup');
        $this->addPath('table_setup.log');
    }

}