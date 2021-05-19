<?php

namespace Nemundo\App\Mail\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Mail\Data\MailModelCollection;
use Nemundo\App\Mail\Install\MailInstall;
use Nemundo\App\Mail\Install\MailUninstall;
use Nemundo\App\Mail\Site\MailSite;
use Nemundo\FrameworkProject;

class MailApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->project = new FrameworkProject();
        $this->application = 'Mail';
        $this->applicationId = 'ff1c819d-f015-4200-8421-b3ba4ad08f0c';
        $this->modelCollectionClass = MailModelCollection::class;
        $this->installClass = MailInstall::class;
        $this->uninstallClass = MailUninstall::class;
        $this->adminSiteClass = MailSite::class;

    }

}