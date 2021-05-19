<?php


namespace Nemundo\Srf\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ShowParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'show';
    }

}