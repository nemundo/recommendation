<?php
namespace Nemundo\Content\App\Camera\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class CameraParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'camera';
}
}