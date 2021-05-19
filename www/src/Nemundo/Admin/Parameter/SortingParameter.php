<?php

namespace Nemundo\Admin\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class SortingParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'sorting';
    }

}