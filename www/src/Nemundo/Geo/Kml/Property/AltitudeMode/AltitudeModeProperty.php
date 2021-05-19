<?php

namespace Nemundo\Geo\Kml\Property\AltitudeMode;


use Nemundo\Geo\Kml\Property\AbstractProperty;

class AltitudeModeProperty extends AbstractProperty
{

    public function getContent()
    {

        $this->tagName = 'altitudeMode';
        return parent::getContent();

    }

}