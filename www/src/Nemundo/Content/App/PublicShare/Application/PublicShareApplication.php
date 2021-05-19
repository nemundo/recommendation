<?php

namespace Nemundo\Content\App\PublicShare\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\PublicShare\Data\PublicShareModelCollection;
use Nemundo\Content\App\PublicShare\Install\PublicShareInstall;
use Nemundo\Content\App\PublicShare\Install\PublicShareUninstall;
use Nemundo\Content\App\PublicShare\Site\PublicShareAdminSite;
use Nemundo\Content\App\PublicShare\Site\PublicShareSite;

class PublicShareApplication extends AbstractApplication
{
    protected function loadApplication()
    {

        $this->application = 'Public Share';
        $this->applicationId = 'b6a2c59b-bc39-417c-ae53-7f8cc6b8fe82';
        $this->modelCollectionClass = PublicShareModelCollection::class;
        $this->installClass = PublicShareInstall::class;
        $this->uninstallClass = PublicShareUninstall::class;
        //$this->siteClass=PublicShareSite::$site;
        $this->publicSiteClass = PublicShareSite::$site;
        $this->adminSiteClass = PublicShareAdminSite::class;

    }
}