<?php
namespace Nemundo\Content\Index\Relation\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class RelationModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\Index\Relation\Data\Relation\RelationModel());
}
}