<?php
namespace Nemundo\Content\App\Location\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class LocationParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'location';
}
}