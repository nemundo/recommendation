<?php

namespace Nemundo\Model\Data\Property\Geo;


use Nemundo\Core\Type\Geo\AbstractGeoCoordinateAltitude;
use Nemundo\Model\Data\Property\AbstractDataProperty;
use Nemundo\Model\Type\Geo\GeoCoordinateAltitudeType;


class GeoCoordinateAltitudeDataProperty extends AbstractDataProperty
{

    /**
     * @var GeoCoordinateAltitudeType
     */
    protected $type;

    public function setValue(AbstractGeoCoordinateAltitude $geoCoordinate = null)
    {

        if ($geoCoordinate !== null) {

            if ($geoCoordinate->latitude === '') {
                $geoCoordinate->latitude = 0;
            }

            if ($geoCoordinate->longitude === '') {
                $geoCoordinate->longitude = 0;
            }

            if ($geoCoordinate->altitude === '') {
                $geoCoordinate->altitude = 0;
            }

            $this->typeValueList->setModelValue($this->type->latitude, $geoCoordinate->latitude);
            $this->typeValueList->setModelValue($this->type->longitude, $geoCoordinate->longitude);
            $this->typeValueList->setModelValue($this->type->altitude, $geoCoordinate->altitude);
        }

        return $this;

    }

}