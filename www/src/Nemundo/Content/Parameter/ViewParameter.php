<?php

namespace Nemundo\Content\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;


class ViewParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'view';
    }

}