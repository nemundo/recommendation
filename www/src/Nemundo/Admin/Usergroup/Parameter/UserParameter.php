<?php

namespace Nemundo\Admin\Usergroup\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class UserParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'user';
    }

}