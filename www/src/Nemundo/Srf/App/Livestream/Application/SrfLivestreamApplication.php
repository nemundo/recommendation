<?php

namespace Nemundo\Srf\App\Livestream\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Srf\App\Livestream\Data\LivestreamModelCollection;
use Nemundo\Srf\App\Livestream\Install\LivestreamInstall;
use Nemundo\Srf\App\Livestream\Install\LivestreamUninstall;
use Nemundo\Srf\SrfProject;

class SrfLivestreamApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project = new SrfProject();
        $this->application = 'SRF Radio Livestream';
        $this->applicationId = 'b86d93e0-279d-449b-b2ce-958782b71228';
        $this->modelCollectionClass = LivestreamModelCollection::class;
        $this->installClass = LivestreamInstall::class;
        $this->uninstallClass = LivestreamUninstall::class;
    }
}