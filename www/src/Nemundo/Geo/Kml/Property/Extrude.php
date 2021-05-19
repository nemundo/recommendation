<?php

namespace Nemundo\Geo\Kml\Property;


class Extrude extends AbstractProperty
{

    public function getContent()
    {

        $this->tagName = 'extrude';
        return parent::getContent();

    }

}