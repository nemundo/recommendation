<?php
namespace Nemundo\Content\App\ToDo\Data\ToDo;
use Nemundo\Model\Data\AbstractModelUpdate;
class ToDoUpdate extends AbstractModelUpdate {
/**
* @var ToDoModel
*/
public $model;

/**
* @var string
*/
public $toDo;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->toDo, $this->toDo);
parent::update();
}
}