<?php
namespace Nemundo\Content\App\Timeline\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class TimelineModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Timeline\Data\Timeline\TimelineModel());
}
}