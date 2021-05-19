<?php

namespace Nemundo\Content\App\Podcast\Scheduler;

use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Content\App\Podcast\Application\PodcastApplication;
use Nemundo\Content\App\Podcast\Content\Episode\EpisodeContentType;
use Nemundo\Content\App\Podcast\Content\Podcast\PodcastContentBuilder;
use Nemundo\Content\App\Podcast\Content\Podcast\PodcastContentType;
use Nemundo\Content\App\Podcast\Data\Episode\Episode;
use Nemundo\Content\App\Podcast\Data\Episode\EpisodeId;
use Nemundo\Content\App\Podcast\Data\Podcast\Podcast;
use Nemundo\Content\App\Podcast\Data\Podcast\PodcastReader;
use Nemundo\Content\App\Podcast\Data\Podcast\PodcastUpdate;
use Nemundo\Content\Type\Index\ContentIndexBuilder;
use Nemundo\Core\Debug\Debug;
use Nemundo\Rss\Reader\RssReader;

class PodcastScheduler extends AbstractScheduler
{


    protected function loadScheduler()
    {

        //$this->active = true;
        $this->minute = 30;
        $this->overrideSetting = false;

        $this->consoleScript = true;
        $this->scriptName = 'podcast-import';

    }


    public function run()
    {

        //(new PodcastApplication())->reinstallApp()->setAppMenuActive();

        /*$type=new PodcastContentBuilder();
        $type->rssUrl='https://feeds.soundcloud.com/users/soundcloud:users:548834769/sounds.rss';
        $type->saveType();*/

        $podcastReader = new PodcastReader();
        foreach ($podcastReader->getData() as $podcastRow) {

            $rssReader = new RssReader();
            $rssReader->feedUrl = $podcastRow->rssUrl;

            $update = new PodcastUpdate();
            $update->podcast = $rssReader->getTitle();
            $update->description = $rssReader->getDescription();
            $update->updateById($podcastRow->id);


            (new PodcastContentType($podcastRow->id))->saveIndex();


            /*
            $feedType = new FeedContentType();
            $feedType->feedTitle = $rssReader->getTitle();
            $feedType->description = $rssReader->getDescription();
            $feedType->feedUrl = $feedUrl;
            $feedType->saveType();*/

            foreach ($rssReader->getData() as $rssItem) {

                $data = new Episode();
                $data->updateOnDuplicate=true;
                $data->podcastId = $podcastRow->id;
                $data->title = $rssItem->title;
                $data->text = $rssItem->description;
                $data->audioUrl = $rssItem->enclosureUrl;
                $data->dateTime=$rssItem->dateTime;
                $data->save();


                $id=new EpisodeId();
                $id->filter->andEqual($id->model->podcastId,$podcastRow->id );
                $id->filter->andEqual($id->model->audioUrl,$rssItem->enclosureUrl );
                $episodeId=$id->getId();


                $episodeContentType=new EpisodeContentType($episodeId);

                $builder=new ContentIndexBuilder($episodeContentType);
                $builder->buildIndex();





                /*
                $itemType = new FeedItemContentType();
                $itemType->feedId = $feedType->getDataId();
                $itemType->title = $rssItem->title;
                $itemType->description = $rssItem->description;
                $itemType->url = $rssItem->url;
                $itemType->feedDateTime = $rssItem->dateTime;

                if ($rssItem->enclosureType == 'image/jpeg') {
                    $itemType->imageUrl = $rssItem->enclosureUrl;
                }

                if (($rssItem->enclosureType == 'audio/mp3') || ($rssItem->enclosureType == 'audio/mpeg')) {
                    $itemType->audioUrl = $rssItem->enclosureUrl;
                    $itemType->url = $itemType->audioUrl;
                }

                $itemType->addEvent(new TimelineEvent());
                $itemType->saveType();*/


                // Notification

                /*$userReader = new UserReader();
                foreach ($userReader->getData() as $userRow) {
                    $data = new Notification();
                    $data->userId = $userRow->id;
                    $data->contentId = $itemType->getContentId();
                    $data->save();
                }*/


            }

        }

    }
}