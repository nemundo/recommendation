<?php

namespace Nemundo\Orm\Type\Geo;


use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Data\Property\Geo\GeoCoordinateAltitudeDataProperty;
use Nemundo\Model\Reader\Property\Geo\GeoCoordinateAltitudeReaderProperty;
use Nemundo\Model\Type\Geo\GeoCoordinateAltitudeType;
use Nemundo\Orm\Type\OrmTypeTrait;

class GeoCoordinateAltitudeOrmType extends GeoCoordinateAltitudeType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Geo Coordinate/Altitude';
        $this->typeName = 'geo_coordinate_altitude';
        $this->typeId = '38613992-8251-42d7-b806-04bf65e3e36a';
    }

    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, GeoCoordinateAltitudeType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, GeoCoordinateAltitudeType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataObject($phpClass, $phpFunction, GeoCoordinateAltitude::class, GeoCoordinateAltitudeDataProperty::class);

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowObjectProperty($phpClass, GeoCoordinateAltitude::class, GeoCoordinateAltitudeReaderProperty::class);

    }

}