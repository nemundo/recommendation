<?php
namespace Nemundo\Content\App\TimeSeries\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class TimeSeriesParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'timeseries';
}
}