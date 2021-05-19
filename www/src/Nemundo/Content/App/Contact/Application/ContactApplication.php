<?php

namespace Nemundo\Content\App\Contact\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Contact\Data\ContactModelCollection;
use Nemundo\Content\App\Contact\Install\ContactInstall;
use Nemundo\Content\App\Contact\Site\ContactSite;

class ContactApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Contact';
        $this->applicationId = 'b2b5b63e-3d5c-4995-973d-0b560a79f509';
        $this->modelCollectionClass = ContactModelCollection::class;
        $this->installClass = ContactInstall::class;
        $this->appSiteClass = ContactSite::class;
    }
}