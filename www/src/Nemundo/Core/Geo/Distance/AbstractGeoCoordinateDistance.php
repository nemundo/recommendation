<?php

namespace Nemundo\Core\Geo\Distance;

use Nemundo\Core\Base\AbstractBase;

use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Nemundo\Core\Type\Number\Number;


abstract class AbstractGeoCoordinateDistance extends AbstractBase
{


    /**
     * @var bool
     */
    public $roundNumber = false;

    /**
     * @var int
     */
    public $roundDecimal = 2;


    abstract public function getDistance();


    public function getDistanceInMetre()
    {

        $distance = round($this->getDistance() * 1000, 0);
        return $distance;

    }


}