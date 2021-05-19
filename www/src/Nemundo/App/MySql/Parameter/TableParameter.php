<?php


namespace Nemundo\App\MySql\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class TableParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'table';
    }
}