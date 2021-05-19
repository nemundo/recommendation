<?php

namespace Nemundo\Core\Geo\Distance;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Nemundo\Core\Type\Number\Number;


class GeoCoordinateDistance extends AbstractGeoCoordinateDistance
{

    /**
     * @var GeoCoordinate|GeoCoordinateAltitude
     */
    public $geoCoordinateFrom;

    /**
     * @var GeoCoordinate|GeoCoordinateAltitude
     */
    public $geoCoordinateTo;

    /**
     * @var bool
     */
    //public $roundNumber = false;

    /**
     * @var int
     */
    //public $roundDecimal = 2;


    const EARTH_RADIUS = 6371;


    public function __construct()
    {

        $this->geoCoordinateFrom = new GeoCoordinate();
        $this->geoCoordinateTo = new GeoCoordinate();

    }


    public function getDistance()
    {

        $e = (pi() * $this->geoCoordinateFrom->latitude / 180);
        $f = (pi() * $this->geoCoordinateFrom->longitude / 180);
        $g = (pi() * $this->geoCoordinateTo->latitude / 180);
        $h = (pi() * $this->geoCoordinateTo->longitude / 180);
        $i = (cos($e) * cos($g) * cos($f) * cos($h) + cos($e) * sin($f) * cos($g) * sin($h) + sin($e) * sin($g));
        $j = (acos($i));

        $k = GeoCoordinateDistance::EARTH_RADIUS * $j;

        if ($this->roundNumber) {
            $k = (new Number($k))->roundNumber($this->roundDecimal);
        }

        if (is_nan($k)) {
            $k = 0;
        }

        return $k;

    }



    public function getDistanceText() {

        $text=$this->getDistance().' km';
        return $text;


    }



/*
    public function getDistanceInMetre()
    {

        $distance = round($this->getDistance() * 1000, 0);
        return $distance;

    }*/


    public function getVerticalDistance()
    {

        $vertical = $this->geoCoordinateTo->altitude - $this->geoCoordinateFrom->altitude;
        return $vertical;

    }

    public function getAbsoluteVerticalDistance()
    {

        $vertical = abs($this->getVerticalDistance());
        return $vertical;


    }


}