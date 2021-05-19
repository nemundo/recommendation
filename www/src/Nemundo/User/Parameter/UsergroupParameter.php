<?php

namespace Nemundo\User\Parameter;


use Nemundo\User\Data\Usergroup\UsergroupReader;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class UsergroupParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'usergroup';
    }

    public function getUsergroup()
    {

        $row = (new UsergroupReader())->getRowById($this->getValue());
        $usergroup = $row->getUsergroupClassObject();

        return $usergroup;

    }


}