<?php

namespace Nemundo\Orm\Type\Number;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Model\Type\Number\DecimalNumberType;
use Nemundo\Orm\Type\OrmTypeTrait;

class DecimalNumberOrmType extends DecimalNumberType
{

    use OrmTypeTrait;


    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->typeLabel = 'Decimal Number';
        $this->typeName = 'decimal_number';
        $this->typeId = '73050637-3df5-4a26-a814-8a0980f40da8';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, DecimalNumberType::class);
    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, DecimalNumberType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = 'float';

        $phpFunction->add('if (!is_null($this->' . $this->variableName . ')) $this->' . $this->variableName . ' = str_replace(",", ".", $this->' . $this->variableName . ');');
        $phpFunction->add('$this->typeValueList->setModelValue($this->model->' . $this->variableName . ', $this->' . $this->variableName . ');');

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowPrimitiveConversionFunctionVarialbe($phpClass, 'float', 'floatval');

    }

}