<?php


namespace Nemundo\Content\App\Feed\Scheduler;


use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Content\App\Feed\Content\Feed\FeedContentType;
use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Feed\Data\Feed\FeedReader;
use Nemundo\Content\App\Feed\Data\WebCrawler\WebCrawlerReader;
use Nemundo\Content\App\Feed\Import\FeedImport;
use Nemundo\Content\App\Feed\WebCrawler\AbstractFeedWebCrawler;
use Nemundo\Core\Debug\Debug;
use Nemundo\Rss\Reader\RssReader;


class FeedImportScheduler extends AbstractScheduler
{

    protected function loadScheduler()
    {

        $this->active = true;
        $this->minute = 30;
        $this->overrideSetting = false;

        $this->consoleScript = true;
        $this->scriptName = 'feed-import';

    }


    public function run()
    {

        (new FeedImport())->importFeedList();


        $reader=new WebCrawlerReader();
        foreach ($reader->getData() as $crawlerRow) {

            /** @var AbstractFeedWebCrawler $crawler */
            $crawler=new $crawlerRow->phpClass();
            $crawler->getFeedItem();

        }



    }

}