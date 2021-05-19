<?php


namespace Nemundo\Srf\MediaType;


class TvMediaType extends AbstractMediaType
{

    protected function loadType()
    {
        $this->id = 2;
        $this->media = 'TV';
    }

}