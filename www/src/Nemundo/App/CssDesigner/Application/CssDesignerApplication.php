<?php

namespace Nemundo\App\CssDesigner\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\CssDesigner\Data\CssDesignerModelCollection;
use Nemundo\App\CssDesigner\Install\CssDesignerInstall;
use Nemundo\App\CssDesigner\Install\CssDesignerUninstall;
use Nemundo\App\CssDesigner\Site\CssDesignerSite;
use Nemundo\FrameworkProject;

class CssDesignerApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project=new FrameworkProject();
        $this->application = 'CssDesigner';
        $this->applicationId = 'bbd24ec0-445f-4df4-a669-5ea94c2bd1e7';
        $this->modelCollectionClass = CssDesignerModelCollection::class;
        $this->installClass = CssDesignerInstall::class;
        $this->uninstallClass = CssDesignerUninstall::class;
        $this->adminSiteClass = CssDesignerSite::class;
    }
}