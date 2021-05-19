<?php


namespace Nemundo\Srf\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Srf\Data\SrfModelCollection;
use Nemundo\Srf\Install\SrfInstall;
use Nemundo\Srf\Install\SrfUninstall;
use Nemundo\Srf\Site\SrfSite;
use Nemundo\Srf\SrfProject;

class SrfApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->project = new SrfProject();
        $this->application = 'SRF';
        $this->applicationId = '12c3fb58-f8ec-4178-ae95-77fa02ebc434';
        $this->modelCollectionClass = SrfModelCollection::class;
        $this->installClass = SrfInstall::class;
        $this->uninstallClass = SrfUninstall::class;
        $this->appSiteClass = SrfSite::class;
    }

}