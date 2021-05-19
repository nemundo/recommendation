<?php
namespace Nemundo\Content\App\Listing\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ListingModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Listing\Data\Listing\ListingModel());
$this->addModel(new \Nemundo\Content\App\Listing\Data\ListingValue\ListingValueModel());
}
}