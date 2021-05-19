<?php

namespace Nemundo\Content\App\Dashboard\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ContentAppProject;
use Nemundo\Content\App\Dashboard\Data\DashboardModelCollection;
use Nemundo\Content\App\Dashboard\Install\DashboardInstall;
use Nemundo\Content\App\Dashboard\Install\DashboardUninstall;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardAdminSite;

class DashboardApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project=new ContentAppProject();
        $this->application = 'Dashboard';
        $this->applicationId = '43dba79e-2009-485c-9736-7e0740d9abe4';
        $this->modelCollectionClass = DashboardModelCollection::class;
        $this->installClass = DashboardInstall::class;
        $this->uninstallClass = DashboardUninstall::class;
        $this->adminSiteClass=DashboardAdminSite::class;
    }
}