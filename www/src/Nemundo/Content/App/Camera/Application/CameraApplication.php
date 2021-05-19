<?php

namespace Nemundo\Content\App\Camera\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Camera\Data\CameraModelCollection;
use Nemundo\Content\App\Camera\Install\CameraInstall;
use Nemundo\Content\App\Camera\Install\CameraUninstall;
use Nemundo\Content\App\Camera\Site\CameraSite;
use Nemundo\Content\App\ContentAppProject;
use Nemundo\Package\Dropzone\DropzonePackage;
use Nemundo\Package\Fancybox\FancyboxPackage;

class CameraApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project=new ContentAppProject();
        $this->application = 'Camera';
        $this->applicationId = 'ad7e1f6f-509a-4607-9ba7-bd78ee02fbf6';
        $this->modelCollectionClass = CameraModelCollection::class;
        $this->installClass = CameraInstall::class;
        $this->uninstallClass = CameraUninstall::class;
        $this->appSiteClass = CameraSite::class;

        $this->addPackage(new DropzonePackage());
        $this->addPackage(new FancyboxPackage());

    }
}