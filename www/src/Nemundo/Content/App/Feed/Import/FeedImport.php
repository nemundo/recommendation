<?php


namespace Nemundo\Content\App\Feed\Import;


use Nemundo\Content\App\Feed\Content\Feed\FeedContentType;
use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Feed\Data\Feed\FeedReader;
use Nemundo\Content\App\Notification\Data\Notification\Notification;
use Nemundo\Content\App\Timeline\Event\TimelineEvent;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Rss\Reader\RssReader;
use Nemundo\User\Data\User\UserReader;

class FeedImport extends AbstractBase
{

    public function importFeed($feedUrl)
    {

        $rssReader = new RssReader();
        $rssReader->feedUrl = $feedUrl;

        $feedType = new FeedContentType();
        $feedType->feedTitle = $rssReader->getTitle();
        $feedType->description = $rssReader->getDescription();
        $feedType->feedUrl = $feedUrl;
        $feedType->saveType();

        foreach ($rssReader->getData() as $rssItem) {

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
            $itemType->saveType();


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


    public function importFeedList()
    {

        $reader = new FeedReader();
        foreach ($reader->getData() as $feedRow) {
            $this->importFeed($feedRow->feedUrl);
        }

    }

}