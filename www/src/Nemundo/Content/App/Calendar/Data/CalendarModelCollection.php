<?php
namespace Nemundo\Content\App\Calendar\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class CalendarModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Calendar\Data\Calendar\CalendarModel());
$this->addModel(new \Nemundo\Content\App\Calendar\Data\CalendarSourceType\CalendarSourceTypeModel());
}
}