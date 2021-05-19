<?php

namespace Nemundo\Content\App\Dashboard\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\Dashboard\Data\DashboardModelCollection;
use Nemundo\Content\App\Dashboard\Install\DashboardInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;

class DashboardCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'dashboard-clean';
    }

    public function run()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new DashboardModelCollection());

        (new DashboardInstall())->install();

    }
}