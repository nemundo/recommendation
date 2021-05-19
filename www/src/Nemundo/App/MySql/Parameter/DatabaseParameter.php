<?php


namespace Nemundo\App\MySql\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class DatabaseParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'database';
    }
}