<?php
namespace Nemundo\App\Linux\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class PathParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'path';
}
}