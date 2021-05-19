<?php

namespace Nemundo\Content\App\Store\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class StoreParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'store';
    }
}