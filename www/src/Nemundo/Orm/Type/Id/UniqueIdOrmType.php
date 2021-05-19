<?php

namespace Nemundo\Orm\Type\Id;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Id\UniqueIdType;
use Nemundo\Orm\Type\OrmTypeTrait;

class UniqueIdOrmType extends UniqueIdType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Unique Id';
        $this->typeId = '6f3dc563-02ac-4ecd-b4de-960e18a5a8c5';
        $this->label = 'Id';
    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, UniqueIdType::class);
    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, UniqueIdType::class);
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