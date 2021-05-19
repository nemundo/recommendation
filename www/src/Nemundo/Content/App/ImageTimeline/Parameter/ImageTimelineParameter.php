<?php
namespace Nemundo\Content\App\ImageTimeline\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class ImageTimelineParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'imagetimeline';
}
}