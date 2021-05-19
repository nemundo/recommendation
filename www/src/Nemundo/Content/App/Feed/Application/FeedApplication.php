<?php


namespace Nemundo\Content\App\Feed\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Feed\Data\FeedModelCollection;
use Nemundo\Content\App\Feed\Install\FeedInstall;
use Nemundo\Content\App\Feed\Install\FeedUninstall;
use Nemundo\Content\App\Feed\Site\Admin\FeedAdminSite;
use Nemundo\Content\App\Feed\Site\FeedSite;

class FeedApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->application = 'Feed';
        $this->applicationId = 'bad8be7d-ef62-4d24-a67c-967f423f5f85';
        $this->modelCollectionClass = FeedModelCollection::class;
        $this->installClass = FeedInstall::class;
        $this->uninstallClass = FeedUninstall::class;
        $this->appSiteClass=FeedSite::class;
        $this->adminSiteClass=FeedAdminSite::class;

    }

}