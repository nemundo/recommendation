<?php

namespace Nemundo\Content\Index\Geo\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;


// latitude

class LatitudeParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'lat';
    }
}