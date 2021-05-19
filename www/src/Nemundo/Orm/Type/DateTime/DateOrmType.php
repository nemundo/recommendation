<?php

namespace Nemundo\Orm\Type\DateTime;

use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Data\Property\DateTime\DateDataProperty;
use Nemundo\Model\Type\DateTime\DateType;
use Nemundo\Orm\Type\OrmTypeTrait;

class DateOrmType extends DateType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->typeLabel = 'Date';
        $this->typeName='date';
        $this->typeId = '72fb15f0-df97-4b5b-9d11-16fd5ef39e32';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, DateType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, DateType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataObject($phpClass, $phpFunction, Date::class, DateDataProperty::class);

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $phpClass->addConstructor('$value = $this->getModelValue($model->' . $this->variableName . ');');
        $phpClass->addConstructor('if ($value !== "0000-00-00") {');
        $this->addRowObject($phpClass, Date::class);
        $phpClass->addConstructor('}');

    }

}