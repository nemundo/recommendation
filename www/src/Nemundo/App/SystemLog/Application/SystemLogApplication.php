<?php

namespace Nemundo\App\SystemLog\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\SystemLog\Install\SystemLogInstall;
use Nemundo\App\SystemLog\Install\SystemLogUninstall;
use Nemundo\App\SystemLog\Site\SystemLogSite;
use Nemundo\FrameworkProject;

class SystemLogApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project=new FrameworkProject();
        $this->application = 'System Log';
        $this->applicationId = '3ccee397-e157-4adb-9d81-96ce0d27979d';
        $this->installClass = SystemLogInstall::class;
        $this->uninstallClass=SystemLogUninstall::class;
        $this->adminSiteClass = SystemLogSite::class;
    }
}