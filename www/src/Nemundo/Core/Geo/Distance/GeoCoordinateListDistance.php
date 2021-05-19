<?php

namespace Nemundo\Core\Geo\Distance;

use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;


class GeoCoordinateListDistance extends AbstractGeoCoordinateDistance
{

    /**
     * @var GeoCoordinate[]|GeoCoordinateAltitude[]
     */
    public $geoCoordinateList = [];

    /**
     * @var GeoCoordinate|GeoCoordinateAltitude
     */
    //public $geoCoordinateTo;

    /**
     * @var bool
     */
    //public $roundNumber = false;

    /**
     * @var int
     */
    //public $roundDecimal = 2;


    //const EARTH_RADIUS = 6371;


    public function addGeoCoordinate(AbstractGeoCoordinate $geoCoordinate)
    {

        $this->geoCoordinateList[] = $geoCoordinate;
        return $this;

    }


    public function getDistance()
    {


        $distance = 0;
        $previousCoordinate = null;

        foreach ($this->geoCoordinateList as $coordinate) {

            if ($previousCoordinate !== null) {
                $geoDistance = new GeoCoordinateDistance();
                $geoDistance->geoCoordinateFrom = $previousCoordinate;
                $geoDistance->geoCoordinateTo = $coordinate;
                $distance = $distance + $geoDistance->getDistance();
            }

            $previousCoordinate = $coordinate;

        }

        return $distance;


    }


    /*
    public function getDistanceInMetre()
    {

        $distance = round($this->getDistance() * 1000, 0);
        return $distance;

    }


    public function getVerticalDistance()
    {

        $vertical = $this->geoCoordinateTo->altitude - $this->geoCoordinateFrom->altitude;
        return $vertical;

    }

    public function getAbsoluteVerticalDistance()
    {

        $vertical = abs($this->getVerticalDistance());
        return $vertical;


    }*/


}