<?php

namespace Nemundo\Project\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Project\Path\WebTmpPath;


class TmpDeleteScript extends AbstractConsoleScript
{

    protected function loadScript()
    {

        $this->scriptName = 'tmp-delete';

    }


    public function run()
    {

        (new TmpPath())
            ->emptyDirectory();

        (new WebTmpPath())
            ->emptyDirectory();

    }


}