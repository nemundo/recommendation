<?php

namespace Nemundo\Project\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Project\Path\LogPath;
use Nemundo\Project\Path\TmpPath;

class LogDeleteScript extends AbstractConsoleScript
{

    protected function loadScript()
    {

        $this->scriptName = 'tmp-delete';

    }


    public function run()
    {

        (new LogPath())
            ->emptyDirectory();

    }


}