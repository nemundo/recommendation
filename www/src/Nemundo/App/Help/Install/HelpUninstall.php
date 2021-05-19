<?php

namespace Nemundo\App\Help\Install;

use Nemundo\App\Help\Data\HelpModelCollection;
use Nemundo\App\Help\Script\HelpImportScript;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class HelpUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new HelpModelCollection());

        (new ScriptSetup())
            ->removeScript(new HelpImportScript());

    }
}