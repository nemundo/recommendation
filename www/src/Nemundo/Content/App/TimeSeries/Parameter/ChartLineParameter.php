<?php

namespace Nemundo\Content\App\TimeSeries\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class ChartLineParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'widget-line';
    }
}