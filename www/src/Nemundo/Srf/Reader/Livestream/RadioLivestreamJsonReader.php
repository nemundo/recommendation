<?php


namespace Nemundo\Srf\Reader\Livestream;


use Nemundo\Srf\Config\BusinessUnit;

class RadioLivestreamJsonReader extends AbstractLivestreamJsonReader
{

    //public $businessUnit = BusinessUnit::SRF;

    protected function loadData()
    {

        $this->jsonUrl = 'https://api.srgssr.ch/audiometadata/v2/livestreams';
        parent::loadData();

    }

}