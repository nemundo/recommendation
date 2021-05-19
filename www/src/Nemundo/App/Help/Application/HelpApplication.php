<?php

namespace Nemundo\App\Help\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Help\Install\HelpInstall;
use Nemundo\App\Help\Install\HelpUninstall;
use Nemundo\App\Help\Site\HelpSite;
use Nemundo\FrameworkProject;

class HelpApplication extends AbstractApplication
{
    protected function loadApplication()
    {

        $this->project = new FrameworkProject();
        $this->application = 'Help';
        $this->applicationId = '9d7fc275-cb09-456a-9d53-138e2ac5d2f0';
        $this->installClass = HelpInstall::class;
        $this->uninstallClass = HelpUninstall::class;
        $this->adminSiteClass = HelpSite::class;

    }
}