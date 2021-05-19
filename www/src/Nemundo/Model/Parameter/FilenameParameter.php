<?php

namespace Nemundo\Model\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class FilenameParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'filename';
    }

}