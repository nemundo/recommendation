<?php

namespace Nemundo\App\Application\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ProjectParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'project';
    }

}