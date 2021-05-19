<?php
namespace Nemundo\Content\Index\Geo\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class GeoIndexParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'geoindex';
}
}