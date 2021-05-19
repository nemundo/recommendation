<?php


namespace Nemundo\App\Backup\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class FileParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'file';
    }

}