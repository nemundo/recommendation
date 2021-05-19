<?php

namespace Nemundo\Content\App\Explorer\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class PrivateShareParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'privateshare';
    }
}