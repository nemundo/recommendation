<?php

namespace Nemundo\App\Application\Application;

use Nemundo\App\Application\Data\ApplicationModelCollection;
use Nemundo\App\Application\Install\ApplicationInstall;
use Nemundo\App\Application\Site\ApplicationSite;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\FrameworkProject;
use Nemundo\Package\Bootstrap\Package\BootstrapPackage;
use Nemundo\Package\FontAwesome\FontAwesomePackage;

class ApplicationApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->project = new FrameworkProject();
        $this->application = 'Application';
        $this->applicationId = '84a6e7e2-9c40-4ea4-9390-2ccc9451f2a1';
        $this->modelCollectionClass = ApplicationModelCollection::class;
        $this->installClass = ApplicationInstall::class;
        $this->adminSiteClass = ApplicationSite::class;

        $this->addPackage(new BootstrapPackage());
        $this->addPackage(new FontAwesomePackage());

    }

}