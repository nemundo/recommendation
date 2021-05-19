<?php

namespace Nemundo\Geo\Kml\Element;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;

class Circle extends LinearRing
{

    /**
     * @var GeoCoordinateAltitude
     */
    public $centerCoordinate;


    public $radiusInMeter;


    public function loadContainer()
    {

        parent::loadContainer();
        $this->centerCoordinate = new GeoCoordinateAltitude();

    }

    public function getContent()
    {



        // https://knackforge.com/blog/narendran/kml-google-map-circle-generator-script-php

        // convert coordinates to radians
        $lat1 = deg2rad($this->centerCoordinate->latitude);
        $long1 = deg2rad($this->centerCoordinate->longitude);
        $d_rad = $this->radiusInMeter / 6378137;


        $coordinatesList='';

        for ($i = 0; $i <= 360; $i += 3) {

            $radial = deg2rad($i);

            //(new Debug())->write($radial);

            $lat_rad = asin(sin($lat1) * cos($d_rad) + cos($lat1) * sin($d_rad) * cos($radial));
             $dlon_rad = atan2(sin($radial) * sin($d_rad) * cos($lat1), cos($d_rad) - sin($lat1) * sin($lat_rad));
            $lon_rad = fmod(($long1 + $dlon_rad + M_PI), 2 * M_PI) - M_PI;
            $coordinatesList .= rad2deg($lon_rad).",".rad2deg($lat_rad).",0 ";

            //(new Debug())->write(rad2deg($lat_rad));

            $coordinate = new GeoCoordinateAltitude();
            $coordinate->latitude = rad2deg($lat_rad);
            $coordinate->longitude = rad2deg($lon_rad);
            $coordinate->altitude = 2000;  // $this->centerCoordinate->altitude;
            $this->addPoint($coordinate);

        }


        return parent::getContent();

    }


}