<?php
namespace Nemundo\Content\App\Podcast\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class PodcastParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'podcast';
}
}