<?php
namespace Nemundo\Content\App\TimeSeries\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class PeriodTypeParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'periodtype';
}
}