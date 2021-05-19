<?php


namespace Nemundo\Srf\Reader\Livestream;


class TvLivestreamJsonReader extends AbstractLivestreamJsonReader
{

    protected function loadData()
    {
        $this->jsonUrl = 'https://api.srgssr.ch/videometadata/v2/livestreams';
        parent::loadData();
    }

}