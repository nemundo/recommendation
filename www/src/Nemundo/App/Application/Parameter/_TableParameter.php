<?php

namespace Nemundo\App\Application\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class TableParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'table-name';
    }

}