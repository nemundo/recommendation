<?php

namespace Nemundo\App\UserAdmin\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class UserUsergroupParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'user-usergroup';
    }
}