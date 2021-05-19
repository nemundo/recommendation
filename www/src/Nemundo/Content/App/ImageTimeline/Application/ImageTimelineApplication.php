<?php

namespace Nemundo\Content\App\ImageTimeline\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimelineModelCollection;
use Nemundo\Content\App\ImageTimeline\Install\ImageTimelineInstall;
use Nemundo\Content\App\ImageTimeline\Install\ImageTimelineUninstall;
use Nemundo\Content\App\ImageTimeline\Site\Admin\ImageTimelineAdminSite;
use Nemundo\Content\App\ImageTimeline\Site\ImageTimelineSite;
use Nemundo\Package\Fancybox\FancyboxPackage;

class ImageTimelineApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Image Timeline';
        $this->applicationId = 'f815d7a6-09bf-4360-8fcf-c1e20fa1f4cd';
        $this->modelCollectionClass = ImageTimelineModelCollection::class;
        $this->installClass = ImageTimelineInstall::class;
        $this->uninstallClass = ImageTimelineUninstall::class;
        $this->appSiteClass = ImageTimelineSite::class;
        $this->adminSiteClass=ImageTimelineAdminSite::class;

        $this->addPackage(new FancyboxPackage());

    }
}