<?php

namespace Nemundo\Content\App\Share\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ContentAppProject;
use Nemundo\Content\App\Share\Data\ShareModelCollection;
use Nemundo\Content\App\Share\Install\ShareInstall;
use Nemundo\Content\App\Share\Install\ShareUninstall;
use Nemundo\Content\App\Share\Site\ShareSite;

class ShareApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project = new ContentAppProject();
        $this->application = 'Share';
        $this->applicationId = '18728cd0-f534-4b0b-8643-e2833c1244d6';
        $this->modelCollectionClass = ShareModelCollection::class;
        $this->appSiteClass = ShareSite::class;
        $this->installClass = ShareInstall::class;
        $this->uninstallClass = ShareUninstall::class;
    }
}