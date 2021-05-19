<?php

namespace Nemundo\App\MySql\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Application\Type\Install\Install;
use Nemundo\App\Application\Type\Install\Uninstall;
use Nemundo\App\MySql\Site\MySqlSite;

class MySqlApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'MySql';
        $this->applicationId = '7a516d66-eeb2-4d45-b8b0-e4d2b4ef9883';
        $this->installClass = Install::class;
        $this->uninstallClass = Uninstall::class;
        $this->adminSiteClass = MySqlSite::class;
    }
}