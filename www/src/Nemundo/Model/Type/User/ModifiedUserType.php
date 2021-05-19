<?php

namespace Nemundo\Model\Type\User;

use Nemundo\Model\Data\Property\User\CreatedUserDataProperty;
use Nemundo\Model\Type\Id\UniqueIdType;

class ModifiedUserType extends UniqueIdType  // UserExternalType
{

    protected function loadExternalType()
    {
        parent::loadExternalType();

       // $this->visible->form = false;
        $this->updatePropertyClassName = CreatedUserDataProperty::class;

    }

}