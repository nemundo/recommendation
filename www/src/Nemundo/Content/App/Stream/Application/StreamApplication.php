<?php

namespace Nemundo\Content\App\Stream\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Stream\Data\StreamModelCollection;
use Nemundo\Content\App\Stream\Install\StreamInstall;
use Nemundo\Content\App\Stream\Install\StreamUninstall;
use Nemundo\Content\App\Stream\Site\ConfigSite;
use Nemundo\Content\App\Stream\Site\StreamAdminSite;
use Nemundo\Content\App\Stream\Site\StreamSite;

class StreamApplication extends AbstractApplication
{
    protected function loadApplication()
    {

        $this->application = 'Stream';
        $this->applicationId = 'bf8b0c4c-b76e-45d7-bab5-01118ee57e46';
        $this->modelCollectionClass = StreamModelCollection::class;
        $this->installClass=StreamInstall::class;
        $this->uninstallClass=StreamUninstall::class;
        $this->appSiteClass = StreamSite::class;
        $this->adminSiteClass= StreamAdminSite::class;


    }
}