<?php

namespace Nemundo\Content\App\IssueTracker\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\IssueTracker\Data\IssueTrackerModelCollection;
use Nemundo\Content\App\IssueTracker\Install\IssueTrackerInstall;
use Nemundo\Content\App\IssueTracker\Install\IssueTrackerUninstall;
use Nemundo\Content\App\IssueTracker\Site\IssueTrackerSite;

class IssueTrackerApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Issue Tracker';
        $this->applicationId = '81d9ae99-1dfc-48f9-862e-8d055fdc8df1';
        $this->modelCollectionClass = IssueTrackerModelCollection::class;
        $this->installClass = IssueTrackerInstall::class;
        $this->uninstallClass = IssueTrackerUninstall::class;
        $this->appSiteClass = IssueTrackerSite::class;
    }
}