<?php

namespace Nemundo\Content\App\Inbox\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Inbox\Data\InboxModelCollection;
use Nemundo\Content\App\Inbox\Install\InboxInstall;
use Nemundo\Content\App\Inbox\Install\InboxUninstall;
use Nemundo\Content\App\Inbox\Site\InboxSite;

class InboxApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Inbox';
        $this->applicationId = 'e4e346da-e891-4f4c-aa6b-bdad8ae536f6';
        $this->modelCollectionClass = InboxModelCollection::class;
        $this->installClass = InboxInstall::class;
        $this->uninstallClass = InboxUninstall::class;
        $this->appSiteClass = InboxSite::class;
    }
}