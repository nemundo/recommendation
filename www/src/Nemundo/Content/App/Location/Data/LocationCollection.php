<?php
namespace Nemundo\Content\App\Location\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class LocationCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Location\Data\Location\LocationModel());
}
}