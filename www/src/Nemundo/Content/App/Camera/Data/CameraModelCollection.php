<?php
namespace Nemundo\Content\App\Camera\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class CameraModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Camera\Data\Camera\CameraModel());
}
}