<?php


namespace Nemundo\Srf\MediaType;


class RadioMediaType extends AbstractMediaType
{

    protected function loadType()
    {
        $this->id = 1;
        $this->media = 'Radio';
    }

}