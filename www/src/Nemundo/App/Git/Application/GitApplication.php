<?php

namespace Nemundo\App\Git\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Application\Type\Install\Install;
use Nemundo\App\Application\Type\Install\Uninstall;
use Nemundo\App\Git\Site\GitSite;
use Nemundo\FrameworkProject;

class GitApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project = new FrameworkProject();
        $this->application = 'Git';
        $this->applicationId = 'c70dbaa0-8d43-4372-8388-2b335cc471da';
        $this->installClass = Install::class;
        $this->uninstallClass = Uninstall::class;
        $this->adminSiteClass = GitSite::class;
    }
}