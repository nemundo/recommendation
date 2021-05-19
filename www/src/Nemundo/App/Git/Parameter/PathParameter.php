<?php
namespace Nemundo\App\Git\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class PathParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'path';
}
}