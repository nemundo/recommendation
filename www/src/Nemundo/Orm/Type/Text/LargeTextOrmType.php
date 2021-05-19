<?php

namespace Nemundo\Orm\Type\Text;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Text\LargeTextType;
use Nemundo\Orm\Type\OrmTypeTrait;

class LargeTextOrmType extends LargeTextType
{

    use OrmTypeTrait;


    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->typeLabel = 'Large Text';
        $this->typeName='large_text';
        $this->typeId = '7ffa159e-71c0-4c98-887f-58161d225346';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, LargeTextType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, LargeTextType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataPrimitiveVariable($phpClass, $phpFunction, 'string');

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowPrimitiveVarialbe($phpClass, 'string');

    }


}