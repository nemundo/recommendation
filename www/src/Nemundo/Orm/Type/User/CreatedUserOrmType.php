<?php

namespace Nemundo\Orm\Type\User;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\User\CreatedUserType;


class CreatedUserOrmType extends UserOrmType
{

    protected function loadExternalType()
    {

        parent::loadExternalType();
        $this->typeLabel = 'Created User';
        $this->typeName = 'created_user';
        $this->typeId = 'e37deb62-9855-413f-9e76-aee5a6a56cf0';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternalModelCode($phpClass, $phpFunction, CreatedUserType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternalExternalCode($phpClass, $phpFunction, CreatedUserType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        // function überschreiben

    }

}