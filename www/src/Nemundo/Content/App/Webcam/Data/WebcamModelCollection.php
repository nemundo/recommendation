<?php
namespace Nemundo\Content\App\Webcam\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WebcamModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Webcam\Data\Webcam\WebcamModel());
$this->addModel(new \Nemundo\Content\App\Webcam\Data\WebcamImage\WebcamImageModel());
}
}