<?php
namespace Nemundo\Content\App\ToDo\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ToDoModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\ToDo\Data\ToDo\ToDoModel());
}
}