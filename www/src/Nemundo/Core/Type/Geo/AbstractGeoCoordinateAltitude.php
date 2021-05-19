<?php

namespace Nemundo\Core\Type\Geo;


abstract class AbstractGeoCoordinateAltitude extends AbstractGeoCoordinate
{

    /**
     * @var float
     */
    public $altitude;


    public function fromGeoCoordinate(GeoCoordinate $geoCoordinate = null)
    {
        if ($geoCoordinate !== null) {
            $this->latitude = $geoCoordinate->latitude;
            $this->longitude = $geoCoordinate->longitude;
        }
        return $this;
    }


    public function getText()
    {
        $text = $this->latitude . ',' . $this->longitude . ',' . $this->altitude;
        return $text;
    }

}