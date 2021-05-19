<?php


namespace Nemundo\Srf\Reader\Episode;


class TvEpisodeJsonReader extends AbstractEpisodeJsonReader
{

    protected function loadData()
    {

        $this->jsonUrl = 'https://api.srgssr.ch/videometadata/v2/latest_episodes/shows/';
        parent::loadData();


    }


}