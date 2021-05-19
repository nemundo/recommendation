<?php
namespace Nemundo\Content\App\ToDo\Data\ToDo;
class ToDoBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ToDoModel
*/
protected $model;

/**
* @var string
*/
public $toDo;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->toDo, $this->toDo);
$id = parent::save();
return $id;
}
}