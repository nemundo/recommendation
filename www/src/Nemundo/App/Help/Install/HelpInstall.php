<?php

namespace Nemundo\App\Help\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Help\Application\HelpApplication;
use Nemundo\App\Help\Data\HelpModelCollection;
use Nemundo\App\Help\Script\HelpImportScript;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class HelpInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new HelpApplication());
        (new ModelCollectionSetup())->addCollection(new HelpModelCollection());

        (new ScriptSetup())
            ->addScript(new HelpImportScript());

    }
}