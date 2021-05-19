<?php

namespace Nemundo\User\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class SecureTokenParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'secure-token';
    }
}