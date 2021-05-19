<?php

namespace Nemundo\Content\App\WebCrawler\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ContentAppProject;
use Nemundo\Content\App\WebCrawler\Install\WebCrawlerInstall;
use Nemundo\Content\App\WebCrawler\Install\WebCrawlerUninstall;
use Nemundo\Content\App\WebCrawler\Data\WebCrawlerModelCollection;
use Nemundo\Content\App\WebCrawler\Site\WebCrawlerSite;

class WebCrawlerApplication extends AbstractApplication
{
    protected function loadApplication()
    {

        $this->project=new ContentAppProject();
        $this->application = 'Web Crawler';
        $this->applicationId = '942ed9b8-df60-403e-b211-071c32a09271';
        $this->modelCollectionClass=WebCrawlerModelCollection::class;
        $this->installClass=WebCrawlerInstall::class;
        $this->uninstallClass=WebCrawlerUninstall::class;

        $this->appSiteClass=WebCrawlerSite::class;


    }
}