<?php
namespace Nemundo\Srf\Widget\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WidgetModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Srf\Widget\Data\ShowWidget\ShowWidgetModel());
}
}