<?php


namespace Nemundo\Core\Geo\Addition;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;
use Nemundo\Core\Type\Geo\GeoCoordinate;


// move to core

class GeoCoordinateAddition extends AbstractBase
{

    //const EARTH_RADIUS = 6371;

    /**
     * @var GeoCoordinate
     */
    private $centerCoordinate;

    public function __construct(AbstractGeoCoordinate $centerCoordinate)
    {

        $this->centerCoordinate = $centerCoordinate;

    }


    public function addDistance($km)
    {

        $earthRadius = 6371;

        //GeoCoordinateAddition::EARTH_RADIUS

        $geoCoordinate = new GeoCoordinate();
        $geoCoordinate->latitude = $this->centerCoordinate->latitude + ($km / $earthRadius) * (180 / pi());
        $geoCoordinate->longitude = $this->centerCoordinate->longitude + ($km /$earthRadius) * (180 / pi());


        return $geoCoordinate;

    }


}