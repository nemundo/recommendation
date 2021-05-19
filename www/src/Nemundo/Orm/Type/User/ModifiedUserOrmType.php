<?php

namespace Nemundo\Orm\Type\User;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\User\ModifiedUserType;


class ModifiedUserOrmType extends UserOrmType
{

    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->typeLabel = 'Modified User';
        $this->typeId = '3e5df96f-cc14-41d1-8069-2ba44307f0c1';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternalModelCode($phpClass, $phpFunction, ModifiedUserType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternalExternalCode($phpClass, $phpFunction, ModifiedUserType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        // überschreiben

    }

}