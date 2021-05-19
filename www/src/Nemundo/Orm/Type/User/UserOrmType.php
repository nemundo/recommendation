<?php

namespace Nemundo\Orm\Type\User;


use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\User\Data\User\UserModel;


class UserOrmType extends ExternalOrmType
{

    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->typeLabel = 'User';
        $this->typeName = 'user';
        $this->typeId = 'b1e71df1-b21f-4b24-95ed-fd866d76da9a';

        $this->externalModelClassName = $this->prefixClassName(UserModel::class);

        /*$this->adminFormPartClassName = ExternalUserTypeFormPart::class;
        $this->adminItemClassName = ExternalUserModelFieldAdminItem::class;*/

    }


    protected function getExternalClassName()
    {

        $externalClassName = 'Nemundo\User\Data\User\User';
        return $externalClassName;

    }

}