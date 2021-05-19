<?php
namespace Nemundo\Content\App\Feiertag\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class FeiertagModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Feiertag\Data\Feiertag\FeiertagModel());
}
}