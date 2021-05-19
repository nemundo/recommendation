<?php

namespace Nemundo\App\ModelDesigner\Install;


use Nemundo\App\ModelDesigner\Script\JsonCleanScript;
use Nemundo\App\ModelDesigner\Script\ModelDesignerOrmScript;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ModelDesignerInstall extends AbstractInstall
{

    public function install()
    {

        (new ScriptSetup())
            ->addScript(new JsonCleanScript())
            ->addScript(new ModelDesignerOrmScript());

    }

}