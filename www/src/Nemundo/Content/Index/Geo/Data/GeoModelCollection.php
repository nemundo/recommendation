<?php
namespace Nemundo\Content\Index\Geo\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class GeoModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\Index\Geo\Data\Distance\DistanceModel());
$this->addModel(new \Nemundo\Content\Index\Geo\Data\GeoContentType\GeoContentTypeModel());
$this->addModel(new \Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexModel());
}
}