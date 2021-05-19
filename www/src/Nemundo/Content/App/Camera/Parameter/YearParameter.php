<?php
namespace Nemundo\Content\App\Camera\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class YearParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'year';
}
}