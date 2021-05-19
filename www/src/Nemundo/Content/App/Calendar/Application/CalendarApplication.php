<?php

namespace Nemundo\Content\App\Calendar\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Calendar\Data\CalendarModelCollection;
use Nemundo\Content\App\Calendar\Install\CalendarInstall;
use Nemundo\Content\App\Calendar\Install\CalendarUninstall;
use Nemundo\Content\App\Calendar\Site\CalendarSite;
use Nemundo\Content\App\ContentAppProject;

class CalendarApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project = new ContentAppProject();
        $this->application = 'Calendar';
        $this->applicationId = 'd2615897-d0d0-498c-be14-e21ec91456d5';
        $this->modelCollectionClass = CalendarModelCollection::class;
        $this->installClass = CalendarInstall::class;
        $this->uninstallClass = CalendarUninstall::class;
        $this->appSiteClass = CalendarSite::class;
    }
}