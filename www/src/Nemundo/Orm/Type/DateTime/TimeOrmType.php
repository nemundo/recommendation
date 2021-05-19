<?php

namespace Nemundo\Orm\Type\DateTime;


use Nemundo\Core\Type\DateTime\Time;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Data\Property\DateTime\TimeDataProperty;
use Nemundo\Model\Type\DateTime\TimeType;
use Nemundo\Orm\Type\OrmTypeTrait;

class TimeOrmType extends TimeType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->typeLabel = 'Time';
        $this->typeName='time';
        $this->typeId = '145703d4-c451-46e6-aa47-9b8a4d00557b';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, TimeType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, TimeType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataObject($phpClass, $phpFunction, Time::class, TimeDataProperty::class);

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowObject($phpClass, Time::class);

    }

}