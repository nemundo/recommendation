<?php

namespace Nemundo\Admin\Parameter\Date;

use Nemundo\Web\Parameter\AbstractDateUrlParameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class DateFromParameter extends AbstractDateUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'date-from';
    }
}