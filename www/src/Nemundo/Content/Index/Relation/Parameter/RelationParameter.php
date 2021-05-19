<?php
namespace Nemundo\Content\Index\Relation\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class RelationParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'relation';
}
}