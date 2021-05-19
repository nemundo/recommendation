<?php
namespace Nemundo\Content\App\ImageGallery\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class ImageParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'image';
}
}