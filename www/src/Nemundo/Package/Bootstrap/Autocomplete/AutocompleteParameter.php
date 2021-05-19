<?php

namespace Nemundo\Package\Bootstrap\Autocomplete;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class AutocompleteParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'term';
    }

}