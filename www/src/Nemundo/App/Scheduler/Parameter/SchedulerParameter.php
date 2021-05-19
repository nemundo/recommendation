<?php

namespace Nemundo\App\Scheduler\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class SchedulerParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'scheduler';
    }

}