<?php

namespace Nemundo\User\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\UserAdmin\Site\UserAdminSite;
use Nemundo\FrameworkProject;
use Nemundo\User\Data\UserModelCollection;
use Nemundo\User\Install\UserInstall;
use Nemundo\User\Install\UserUninstall;

class UserApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->project = new FrameworkProject();
        $this->applicationName = 'user';
        $this->application = 'User';
        $this->applicationId = '3fe9852f-322d-4d9d-af37-eaafdcda8f25';
        $this->modelCollectionClass = UserModelCollection::class;
        $this->installClass = UserInstall::class;
        $this->uninstallClass = UserUninstall::class;
        $this->adminSiteClass = UserAdminSite::class;

    }

}