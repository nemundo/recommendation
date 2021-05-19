<?php
namespace Hackathon\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class KeywordParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'keyword';
}
}