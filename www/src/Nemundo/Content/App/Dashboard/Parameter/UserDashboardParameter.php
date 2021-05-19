<?php

namespace Nemundo\Content\App\Dashboard\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class UserDashboardParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'user-dashboard';
    }
}