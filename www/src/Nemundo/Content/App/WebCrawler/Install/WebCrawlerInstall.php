<?php

namespace Nemundo\Content\App\WebCrawler\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\Content\App\WebCrawler\Application\WebCrawlerApplication;
use Nemundo\Content\App\WebCrawler\Data\WebCrawlerModelCollection;
use Nemundo\Content\App\WebCrawler\Scheduler\WebCrawlerScheduler;
use Nemundo\Model\Setup\ModelCollectionSetup;

class WebCrawlerInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new WebCrawlerApplication());
        (new ModelCollectionSetup())->addCollection(new WebCrawlerModelCollection());

        (new SchedulerSetup(new WebCrawlerApplication()))
            ->addScheduler(new WebCrawlerScheduler());


    }
}