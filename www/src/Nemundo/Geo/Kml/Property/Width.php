<?php

namespace Nemundo\Geo\Kml\Property;


class Width extends AbstractProperty
{

    public function getContent()
    {
        $this->tagName = 'width';
        return parent::getContent();
    }

}