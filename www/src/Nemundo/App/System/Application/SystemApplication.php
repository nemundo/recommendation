<?php

namespace Nemundo\App\System\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Application\Type\Install\Install;
use Nemundo\App\Application\Type\Install\Uninstall;
use Nemundo\App\System\Site\SystemSite;
use Nemundo\FrameworkProject;

class SystemApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->project = new FrameworkProject();
        $this->application = 'System';
        $this->applicationId = '42d0dc15-2e80-4566-bbf5-ae8a60c26054';
        $this->adminSiteClass = SystemSite::class;
        $this->installClass = Install::class;
        $this->uninstallClass = Uninstall::class;

    }

}