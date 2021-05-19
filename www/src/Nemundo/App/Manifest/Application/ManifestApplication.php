<?php

namespace Nemundo\App\Manifest\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Application\Type\Install\Install;
use Nemundo\App\Application\Type\Install\Uninstall;
use Nemundo\App\Manifest\Site\ManifestSite;
use Nemundo\FrameworkProject;

class ManifestApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project = new FrameworkProject();
        $this->application = 'Manifest';
        $this->applicationId = '127d07cb-2b7d-4e41-8dcc-55ab133be762';
        $this->installClass = Install::class;
        $this->uninstallClass = Uninstall::class;
        $this->adminSiteClass = ManifestSite::class;
    }
}