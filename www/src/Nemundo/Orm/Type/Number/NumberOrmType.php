<?php

namespace Nemundo\Orm\Type\Number;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Number\NumberType;
use Nemundo\Orm\Type\OrmTypeTrait;

class NumberOrmType extends NumberType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->typeLabel = 'Number';
        $this->typeName='number';
        $this->typeId = '2e65c5e1-f2c9-4d1b-81e7-eda10077f195';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, NumberType::class);

    }

    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, NumberType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataPrimitiveVariable($phpClass, $phpFunction, 'int');

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowPrimitiveConversionFunctionVarialbe($phpClass, 'int','intval');

    }

}