<?php

namespace Nemundo\Content\App\Podcast\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ContentAppProject;
use Nemundo\Content\App\Podcast\Data\PodcastModelCollection;
use Nemundo\Content\App\Podcast\Install\PodcastInstall;
use Nemundo\Content\App\Podcast\Install\PodcastUninstall;
use Nemundo\Content\App\Podcast\Site\PodcastSite;

class PodcastApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->project=new ContentAppProject();
        $this->application = 'Podcast';
        $this->applicationId = 'c0771f25-8f1f-4305-aefd-087cd492bb6f';
        $this->modelCollectionClass=PodcastModelCollection::class;
        $this->appSiteClass=PodcastSite::class;
        $this->installClass=PodcastInstall::class;
        $this->uninstallClass=PodcastUninstall::class;
    }
}