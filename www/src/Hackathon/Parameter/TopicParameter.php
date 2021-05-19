<?php
namespace Hackathon\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class TopicParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'topic';
}
}