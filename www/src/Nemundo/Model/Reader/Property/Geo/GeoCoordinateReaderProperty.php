<?php

namespace Nemundo\Model\Reader\Property\Geo;


use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Model\Reader\Property\AbstractReaderProperty;
use Nemundo\Model\Type\Geo\GeoCoordinateType;

class GeoCoordinateReaderProperty extends AbstractReaderProperty
{

    /**
     * @var GeoCoordinateType
     */
    protected $type;

    public function getValue()
    {

        $geoCoordinate = new GeoCoordinate();
        $geoCoordinate->latitude = $this->modelRow->getModelValue($this->type->latitude);
        $geoCoordinate->longitude = $this->modelRow->getModelValue($this->type->longitude);

        return $geoCoordinate;

    }

}