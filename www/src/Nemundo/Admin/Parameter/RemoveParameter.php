<?php

namespace Nemundo\Admin\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class RemoveParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'remove';
    }
}