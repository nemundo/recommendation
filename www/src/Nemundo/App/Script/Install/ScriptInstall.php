<?php

namespace Nemundo\App\Script\Install;

use Nemundo\App\Application\Install\ApplicationInstall;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Application\ScriptApplication;
use Nemundo\App\Script\Data\ScriptModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ScriptInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationInstall())->install();

        (new ApplicationSetup())
            ->addApplication(new ScriptApplication());

        (new ModelCollectionSetup())
            ->addCollection(new ScriptModelCollection());

    }

}