<?php

namespace Nemundo\Content\App\Task\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class SourceParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'source';
    }
}