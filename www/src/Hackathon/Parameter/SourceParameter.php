<?php
namespace Hackathon\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class SourceParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'source';
}
}