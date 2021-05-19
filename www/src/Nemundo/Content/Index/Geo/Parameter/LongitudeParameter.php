<?php

namespace Nemundo\Content\Index\Geo\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;


class LongitudeParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'lon';
    }
}