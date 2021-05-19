<?php

namespace Nemundo\App\Linux\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Application\Type\Install\Install;
use Nemundo\App\Application\Type\Install\Uninstall;
use Nemundo\App\Linux\Site\LinuxSite;
use Nemundo\FrameworkProject;

class LinuxApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project = new FrameworkProject();
        $this->application = 'Linux';
        $this->applicationId = 'a48334bb-db41-4b54-965c-07a2844b0858';
        $this->installClass = Install::class;
        $this->uninstallClass = Uninstall::class;
        $this->adminSiteClass = LinuxSite::class;
    }
}