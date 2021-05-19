<?php

namespace Nemundo\Web\Action;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ActionUrlParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'action';
        $this->defaultValue = 'index';
    }

}