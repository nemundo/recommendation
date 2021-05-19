<?php

namespace Nemundo\App\FileLog\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Project\Path\LogPath;

class FileLogDeleteScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'filelog-delete';
    }


    public function run()
    {

        (new LogPath())->emptyDirectory();

    }

}