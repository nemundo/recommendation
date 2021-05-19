<?php

namespace Nemundo\App\Composer\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Application\Type\Install\Install;
use Nemundo\App\Application\Type\Install\Uninstall;
use Nemundo\App\Composer\Site\ComposerSite;
use Nemundo\FrameworkProject;

class ComposerApplication extends AbstractApplication
{
    protected function loadApplication()
    {

        $this->project=new FrameworkProject();
        $this->application = 'Composer';
        $this->applicationId = '9fa9a239-cfd0-415c-af10-9bbe45f17bf9';
        $this->installClass = Install::class;
        $this->uninstallClass = Uninstall::class;
        $this->adminSiteClass = ComposerSite::class;

    }
}