<?php
namespace Nemundo\Content\App\Layout\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class LayoutModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Layout\Data\LayoutColumn\LayoutColumnModel());
}
}