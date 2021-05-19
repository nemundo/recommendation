<?php


namespace Nemundo\Content\App\Podcast\Import;


use Nemundo\Content\App\Podcast\Content\Episode\EpisodeContentType;
use Nemundo\Content\App\Podcast\Content\Podcast\PodcastContentType;
use Nemundo\Content\App\Podcast\Data\Episode\Episode;
use Nemundo\Content\App\Podcast\Data\Episode\EpisodeId;
use Nemundo\Content\App\Podcast\Data\Podcast\PodcastRow;
use Nemundo\Content\App\Podcast\Data\Podcast\PodcastUpdate;
use Nemundo\Content\Type\Index\ContentIndexBuilder;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Rss\Reader\RssReader;

class PodcastImport extends AbstractBase
{


    public function importPodcast(PodcastRow $podcastRow)
    {


        $rssReader = new RssReader();
        $rssReader->feedUrl = $podcastRow->rssUrl;

        $update = new PodcastUpdate();
        $update->podcast = $rssReader->getTitle();
        $update->description = $rssReader->getDescription();
        $update->updateById($podcastRow->id);

        (new PodcastContentType($podcastRow->id))->saveIndex();

        foreach ($rssReader->getData() as $rssItem) {

            $data = new Episode();
            $data->updateOnDuplicate = true;
            $data->podcastId = $podcastRow->id;
            $data->title = $rssItem->title;
            $data->text = $rssItem->description;
            $data->audioUrl = $rssItem->enclosureUrl;
            $data->dateTime = $rssItem->dateTime;
            $data->save();

            $id = new EpisodeId();
            $id->filter->andEqual($id->model->podcastId, $podcastRow->id);
            $id->filter->andEqual($id->model->audioUrl, $rssItem->enclosureUrl);
            $episodeId = $id->getId();


            $episodeContentType = new EpisodeContentType($episodeId);

            $builder = new ContentIndexBuilder($episodeContentType);
            $builder->buildIndex();

        }

    }

}