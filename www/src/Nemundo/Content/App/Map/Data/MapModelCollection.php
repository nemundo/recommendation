<?php
namespace Nemundo\Content\App\Map\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class MapModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Map\Data\Route\RouteModel());
$this->addModel(new \Nemundo\Content\App\Map\Data\RouteCoordinate\RouteCoordinateModel());
$this->addModel(new \Nemundo\Content\App\Map\Data\SwissMapContent\SwissMapContentModel());
}
}