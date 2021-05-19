<?php

namespace Nemundo\Content\App\Job\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ContentAppProject;
use Nemundo\Content\App\Job\Data\JobModelCollection;
use Nemundo\Content\App\Job\Install\JobInstall;
use Nemundo\Content\App\Job\Install\JobUninstall;
use Nemundo\Content\App\Job\Site\JobSite;

class JobApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project = new ContentAppProject();
        $this->application = 'Job';
        $this->applicationId = 'dfa666d3-1f39-4a70-8ce4-0495a6f7be19';
        $this->modelCollectionClass = JobModelCollection::class;
        $this->installClass = JobInstall::class;
        $this->uninstallClass = JobUninstall::class;
        $this->adminSiteClass = JobSite::class;
    }
}