<?php

namespace Nemundo\User\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class PasswordChangeParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'password-change';
    }

}