<?php
namespace Nemundo\App\Linux\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class FilenameParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'filename';
}
}