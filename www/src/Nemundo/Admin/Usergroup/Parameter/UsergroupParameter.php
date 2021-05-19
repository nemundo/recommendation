<?php

namespace Nemundo\Admin\Usergroup\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class UsergroupParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'usergroup';
    }

}