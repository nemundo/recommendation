<?php

namespace Nemundo\Content\App\Notification\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ContentAppProject;
use Nemundo\Content\App\Notification\Data\NotificationModelCollection;
use Nemundo\Content\App\Notification\Install\NotificationInstall;
use Nemundo\Content\App\Notification\Install\NotificationUninstall;
use Nemundo\Content\App\Notification\Site\NotificationSite;

class NotificationApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project = new ContentAppProject();
        $this->application = 'Notification';
        $this->applicationId = 'ee1b0a8e-150e-4b3f-9e82-4c6122c9cab7';
        $this->modelCollectionClass = NotificationModelCollection::class;
        $this->installClass = NotificationInstall::class;
        $this->uninstallClass = NotificationUninstall::class;
        $this->appSiteClass = NotificationSite::class;
    }
}