<?php

namespace Nemundo\Orm\Type\Id;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Id\IdType;
use Nemundo\Orm\Type\OrmTypeTrait;

class IdOrmType extends IdType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->label = 'Id';
        $this->isEditable = false;

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, IdType::class);
    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, IdType::class);
    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        // must be empty
    }


    public function getRowCode(PhpClass $phpClass)
    {
        $this->addRowPrimitiveVarialbe($phpClass, 'string');
    }

}