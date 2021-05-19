<?php

namespace Nemundo\App\Script\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ScriptUrlParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'script';
    }

}