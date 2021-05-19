<?php


namespace Nemundo\Content\App\Podcast\Content\Podcast;


use Nemundo\Content\App\Podcast\Data\Podcast\Podcast;

class PodcastContentBuilder extends PodcastContentType
{

    public $rssUrl;

    protected function onCreate()
    {

        $data = new Podcast();
        $data->ignoreIfExists = true;
        $data->rssUrl = $this->rssUrl;
        $this->dataId = $data->save();


    }

    protected function onUpdate()
    {
    }

    protected function onDelete()
    {
    }

    protected function onIndex()
    {
    }


}