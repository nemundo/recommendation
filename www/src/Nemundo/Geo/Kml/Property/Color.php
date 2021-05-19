<?php

namespace Nemundo\Geo\Kml\Property;


class Color extends AbstractProperty
{

    public function getContent()
    {
        $this->tagName = 'color';
        return parent::getContent();
    }

}