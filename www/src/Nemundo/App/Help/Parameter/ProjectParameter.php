<?php

namespace Nemundo\App\Help\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class ProjectParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'project';
    }
}