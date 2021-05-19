<?php

namespace Nemundo\App\FileLog\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Application\Type\Install\Uninstall;
use Nemundo\App\FileLog\Install\FileLogInstall;
use Nemundo\App\FileLog\Site\FileLogSite;
use Nemundo\FrameworkProject;

class FileLogApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project = new FrameworkProject();
        $this->application = 'File Log';
        $this->applicationId = '200fd709-f3b0-4104-83ee-1cf99e603f84';
        $this->installClass = FileLogInstall::class;
        $this->uninstallClass = Uninstall::class;
        $this->adminSiteClass = FileLogSite::class;
    }
}