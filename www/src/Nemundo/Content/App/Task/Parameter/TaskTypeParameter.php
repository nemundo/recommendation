<?php

namespace Nemundo\Content\App\Task\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class TaskTypeParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'tasktype';
    }
}