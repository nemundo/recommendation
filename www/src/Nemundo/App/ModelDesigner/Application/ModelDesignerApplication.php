<?php

namespace Nemundo\App\ModelDesigner\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Application\Type\Install\Install;
use Nemundo\App\ModelDesigner\Install\ModelDesignerInstall;
use Nemundo\App\ModelDesigner\Site\ModelDesignerSite;
use Nemundo\FrameworkProject;

class ModelDesignerApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project = new FrameworkProject();
        $this->application = 'Model Designer';
        $this->applicationId = '66fd63b1-f9bf-4374-80b5-1b6121fba7b3';
        $this->installClass = Install::class;
        $this->uninstallClass = ModelDesignerInstall::class;
        $this->adminSiteClass = ModelDesignerSite::class;
    }
}