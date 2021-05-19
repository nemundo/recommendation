<?php


namespace Nemundo\Srf\Reader\Episode;


use Nemundo\Srf\Config\BusinessUnit;

class RadioEpisodeJsonReader extends AbstractEpisodeJsonReader
{

    /**
     * @var string
     */
    public $showId;

    public $businessUnit = BusinessUnit::SRF;


    protected function loadData()
    {

        $this->jsonUrl = 'https://api.srgssr.ch/audiometadata/v2/episodeComposition/shows/';
        parent::loadData();

    }

}