<?php

namespace Hackathon\Scheduler;

use Hackathon\Event\MasterEvent;
use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Content\App\Timeline\Event\TimelineEvent;
use Nemundo\Content\Type\EventTrait;
use Nemundo\Core\Debug\Debug;
use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;

class NewsImportScheduler extends AbstractScheduler
{
    protected function loadScheduler()
    {

        $this->consoleScript=true;
        $this->scriptName='news-import';

    }

    public function run()
    {

        /*(new Debug())->write('Bajour');
        (new \Hackathon\Content\BajourJob\BajourImportJob())->run();*/

        /*(new Debug())->write('Rss');
        $type = new \Nemundo\Content\App\Feed\Content\Item\FeedItemContentType();
        \Nemundo\Content\App\Feed\Content\Feed\FeedContentType::$indexBuilderClass[] = \Hackathon\Index\NewsIndexBuilder::class;

        (new \Nemundo\Content\App\Feed\Import\FeedImport())->importFeedList();*/


        (new Debug())->write('SRF');
        /*$type = new TvEpisodeContentType();
        TvEpisodeContentType::$indexBuilderClass[] = \Hackathon\Index\NewsIndexBuilder::class;*/


        (new TvEpisodeContentType())->registerEvent(new MasterEvent());
        (new TvEpisodeContentType())->registerEvent(new TimelineEvent());



        //(new Debug())->write(EventTrait::$eventRegisterList);



        //
        //
        (new \Nemundo\Srf\Import\SrfImport())->importData();


    }
}