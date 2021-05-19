<?php

namespace Nemundo\Model\Data\Property\Geo;


use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;
use Nemundo\Model\Data\Property\AbstractDataProperty;
use Nemundo\Model\Type\Geo\GeoCoordinateType;

class GeoCoordinateDataProperty extends AbstractDataProperty
{

    /**
     * @var GeoCoordinateType
     */
    protected $type;

    public function setValue(AbstractGeoCoordinate $geoCoordinate)
    {

        if ($geoCoordinate->latitude == '') {
            $geoCoordinate->latitude = 0;
        }

        if ($geoCoordinate->longitude == '') {
            $geoCoordinate->longitude = 0;
        }

        $this->typeValueList->setModelValue($this->type->latitude, $geoCoordinate->latitude);
        $this->typeValueList->setModelValue($this->type->longitude, $geoCoordinate->longitude);

        return $this;
    }

}