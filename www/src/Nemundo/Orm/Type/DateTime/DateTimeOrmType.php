<?php

namespace Nemundo\Orm\Type\DateTime;

use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty;
use Nemundo\Model\Type\DateTime\DateTimeType;
use Nemundo\Orm\Type\OrmTypeTrait;

class DateTimeOrmType extends DateTimeType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->typeLabel = 'Date/Time';
        $this->typeName='date_time';
        $this->typeId = 'bd4c13b4-bc75-4f83-b6f3-58ecfa28e669';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, DateTimeType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, DateTimeType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataObject($phpClass, $phpFunction, DateTime::class, DateTimeDataProperty::class);

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowObject($phpClass, DateTime::class);

    }

}