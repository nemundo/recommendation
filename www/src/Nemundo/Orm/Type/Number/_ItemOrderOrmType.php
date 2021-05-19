<?php

namespace Nemundo\Orm\Type\Number;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Number\ItemOrderType;
use Nemundo\Orm\Type\OrmTypeTrait;

class ItemOrderOrmType extends ItemOrderType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->typeLabel = 'Item Order';
        $this->typeId = 'b2666ba5-db54-4dc2-b02d-d04cad1fd00f';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, ItemOrderType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, ItemOrderType::class);

    }

    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
    }


    public function getRowCode(PhpClass $phpClass)
    {
        $this->addRowPrimitiveVarialbe($phpClass, 'int');
    }

}