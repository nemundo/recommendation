<?php

namespace Nemundo\Model\Type\User;


use Nemundo\User\Data\User\UserExternalType;


class UserType extends UserExternalType
{

    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->fieldName = 'user';
        $this->label = 'User';

    }


}