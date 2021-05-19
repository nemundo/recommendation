<?php


namespace Nemundo\App\SqLite\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class TableParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'SqLite-table';
    }
}