<?php

namespace Nemundo\Content\App\Explorer\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class RefererContentParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'referercontent';
    }
}