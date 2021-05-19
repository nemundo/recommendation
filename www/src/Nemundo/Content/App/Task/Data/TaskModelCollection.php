<?php
namespace Nemundo\Content\App\Task\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class TaskModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Task\Data\TaskIndex\TaskIndexModel());
}
}