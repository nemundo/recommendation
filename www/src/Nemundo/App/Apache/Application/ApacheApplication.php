<?php

namespace Nemundo\App\Apache\Application;

use Nemundo\App\Apache\Install\ApacheInstall;
use Nemundo\App\Apache\Install\ApacheUninstall;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\FrameworkProject;

class ApacheApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project = new FrameworkProject();
        $this->application = 'Apache';
        $this->applicationId = '7361e6e8-7853-4733-a79b-f4e348ea3225';
        $this->installClass = ApacheInstall::class;
        $this->uninstallClass = ApacheUninstall::class;
    }
}