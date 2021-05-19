<?php

namespace Nemundo\Orm\Type\Geo;


use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty;
use Nemundo\Model\Reader\Property\Geo\GeoCoordinateReaderProperty;
use Nemundo\Model\Type\Geo\GeoCoordinateType;
use Nemundo\Orm\Type\OrmTypeTrait;


class GeoCoordinateOrmType extends GeoCoordinateType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Geo Coordinate';
        $this->typeName='geo_coordinate';
        $this->typeId = '5a82b98c-d3b5-487e-a0db-1abb667d2992';
    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, GeoCoordinateType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, GeoCoordinateType::class);

    }

    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataObject($phpClass, $phpFunction, GeoCoordinate::class, GeoCoordinateDataProperty::class);

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowObjectProperty($phpClass, GeoCoordinate::class, GeoCoordinateReaderProperty::class);

    }

}