<?php
namespace Nemundo\Content\App\Job\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class JobParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'job';
}
}