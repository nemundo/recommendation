<?php

namespace Nemundo\Content\App\Dashboard\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class DashboardParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'dashboard';
    }
}