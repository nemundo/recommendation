<?php

namespace Nemundo\Content\App\Explorer\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ContentAppProject;
use Nemundo\Content\App\Explorer\Data\ExplorerModelCollection;
use Nemundo\Content\App\Explorer\Install\ExplorerInstall;
use Nemundo\Content\App\Explorer\Install\ExplorerUninstall;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;

class ExplorerApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project=new ContentAppProject();
        $this->application = 'Explorer';
        $this->applicationId = '2d8aab21-e5c1-4b1a-8740-9682c7e88405';
        $this->modelCollectionClass = ExplorerModelCollection::class;
        $this->installClass = ExplorerInstall::class;
        $this->uninstallClass = ExplorerUninstall::class;
        $this->appSiteClass = ExplorerSite::class;

    }
}