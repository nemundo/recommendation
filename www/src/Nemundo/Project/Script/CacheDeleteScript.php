<?php

namespace Nemundo\Project\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Project\Path\CachePath;


class CacheDeleteScript extends AbstractConsoleScript
{

    protected function loadScript()
    {

        $this->scriptName = 'cache-delete';

    }


    public function run()
    {

        (new CachePath())->emptyDirectory();

    }

}