<?php

namespace Nemundo\Model\Reader\Property\Geo;


use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Nemundo\Model\Reader\Property\AbstractReaderProperty;
use Nemundo\Model\Type\Geo\GeoCoordinateAltitudeType;

class GeoCoordinateAltitudeReaderProperty extends AbstractReaderProperty
{

    /**
     * @var GeoCoordinateAltitudeType
     */
    protected $type;

    public function getValue()
    {

        $geoCoordinate = new GeoCoordinateAltitude();
        $geoCoordinate->latitude = $this->modelRow->getModelValue($this->type->latitude);
        $geoCoordinate->longitude = $this->modelRow->getModelValue($this->type->longitude);
        $geoCoordinate->altitude = $this->modelRow->getModelValue($this->type->altitude);

        return $geoCoordinate;

    }

}