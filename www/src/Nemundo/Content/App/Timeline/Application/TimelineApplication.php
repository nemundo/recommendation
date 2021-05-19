<?php

namespace Nemundo\Content\App\Timeline\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Timeline\Data\TimelineModelCollection;
use Nemundo\Content\App\Timeline\Install\TimelineInstall;
use Nemundo\Content\App\Timeline\Install\TimelineUninstall;
use Nemundo\Content\App\Timeline\Site\TimelineSite;

class TimelineApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Timeline';
        $this->applicationId = '20a5c64d-d86a-4c2d-84ce-724f63b9bc8f';
        $this->modelCollectionClass = TimelineModelCollection::class;
        $this->installClass = TimelineInstall::class;
        $this->uninstallClass = TimelineUninstall::class;
        $this->appSiteClass = TimelineSite::class;
    }
}