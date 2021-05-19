<?php

namespace Nemundo\Content\App\Webcam\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Webcam\Data\WebcamModelCollection;
use Nemundo\Content\App\Webcam\Install\WebcamInstall;
use Nemundo\Content\App\Webcam\Install\WebcamUninstall;
use Nemundo\Content\App\Webcam\Site\WebcamSite;

class WebcamApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Webcam';
        $this->applicationId = 'bd07a0ed-cf81-437a-a0ef-e1af90ef825f';
        $this->modelCollectionClass = WebcamModelCollection::class;
        $this->installClass = WebcamInstall::class;
        $this->uninstallClass = WebcamUninstall::class;
        $this->appSiteClass = WebcamSite::class;
    }
}