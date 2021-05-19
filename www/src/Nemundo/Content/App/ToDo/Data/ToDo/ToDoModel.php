<?php
namespace Nemundo\Content\App\ToDo\Data\ToDo;
class ToDoModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $toDo;

protected function loadModel() {
$this->tableName = "todo_to_do";
$this->aliasTableName = "todo_to_do";
$this->label = "To Do";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "todo_to_do";
$this->id->externalTableName = "todo_to_do";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "todo_to_do_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->toDo = new \Nemundo\Model\Type\Text\TextType($this);
$this->toDo->tableName = "todo_to_do";
$this->toDo->externalTableName = "todo_to_do";
$this->toDo->fieldName = "to_do";
$this->toDo->aliasFieldName = "todo_to_do_to_do";
$this->toDo->label = "To Do";
$this->toDo->allowNullValue = true;
$this->toDo->length = 255;

}
}