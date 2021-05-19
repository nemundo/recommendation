<?php

namespace Nemundo\Model\Type\User;


use Nemundo\Model\Data\Property\User\CreatedUserDataProperty;
use Nemundo\Model\Type\Id\UniqueIdType;


class CreatedUserType extends UniqueIdType
{

    protected function loadExternalType()
    {

        parent::loadExternalType();
        $this->dataPropertyClassName = CreatedUserDataProperty::class;

    }

}