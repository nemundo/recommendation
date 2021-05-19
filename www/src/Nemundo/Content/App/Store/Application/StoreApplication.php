<?php

namespace Nemundo\Content\App\Store\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ContentAppProject;
use Nemundo\Content\App\Store\Data\StoreModelCollection;
use Nemundo\Content\App\Store\Install\StoreInstall;

class StoreApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project=new ContentAppProject();
        $this->application = 'Store';
        $this->applicationId = '96c88f8a-101e-4f9f-a877-4b2587a37cc5';
        $this->modelCollectionClass = StoreModelCollection::class;
        $this->installClass = StoreInstall::class;
    }
}