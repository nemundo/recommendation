<?php

namespace Nemundo\App\FileLog\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\FileLog\Script\FileLogDeleteScript;
use Nemundo\App\Script\Setup\ScriptSetup;

class FileLogInstall extends AbstractInstall
{
    public function install()
    {

        (new ScriptSetup())
            ->addScript(new FileLogDeleteScript());

    }
}