<?php

namespace Nemundo\Model\Type\Geo;

use Nemundo\Model\Type\Number\DecimalNumberType;

class GeoCoordinateAltitudeType extends GeoCoordinateType
{

    /**
     * @var DecimalNumberType
     */
    public $altitude;

    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->altitude = new DecimalNumberType();
        $this->altitude->label = 'Altitude';
        $this->addType($this->altitude);

    }


    public function createObject()
    {

        parent::createObject();

        $this->altitude->fieldName = $this->fieldName . '_alt';
        $this->altitude->aliasFieldName = $this->aliasFieldName . '_alt';
        $this->altitude->tableName = $this->tableName;
        $this->altitude->allowNullValue = $this->allowNullValue;

    }

}