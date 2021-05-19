<?php

namespace Nemundo\Orm\Type\Number;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Number\YesNoType;
use Nemundo\Orm\Type\OrmTypeTrait;

class YesNoOrmType extends YesNoType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Yes/No';
        $this->typeName='yes_no';
        $this->typeId = 'a9d4724c-8d38-4787-9bc0-2eabbc734335';
    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, YesNoType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, YesNoType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataPrimitiveVariable($phpClass, $phpFunction, 'bool');

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowPrimitiveConversionFunctionVarialbe($phpClass, 'bool','boolval');

    }

}
