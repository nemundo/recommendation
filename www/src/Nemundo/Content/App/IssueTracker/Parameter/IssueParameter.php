<?php
namespace Nemundo\Content\App\IssueTracker\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class IssueParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'issue';
}
}