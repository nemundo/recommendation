<?php

namespace Nemundo\Model\Data\Property\User;


use Nemundo\Model\Data\Property\AbstractDataProperty;
use Nemundo\Model\Data\TypeValue\ModelTypeValueList;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\User\Login\Session\UserIdSession;

class CreatedUserDataProperty extends AbstractDataProperty
{


    public function __construct(AbstractModelType $type, ModelTypeValueList $typeValueList, AbstractModel $model)
    {
        parent::__construct($type, $typeValueList, $model);

        $typeValueList->setModelValue($this->type, (new UserIdSession())->getValue());

    }


}