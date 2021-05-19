<?php

namespace Nemundo\Content\App\Calendar\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class CalendarParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'calendar';
    }
}