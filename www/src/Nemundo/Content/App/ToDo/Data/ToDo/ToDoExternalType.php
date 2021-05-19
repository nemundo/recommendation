<?php
namespace Nemundo\Content\App\ToDo\Data\ToDo;
class ToDoExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $toDo;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ToDoModel::class;
$this->externalTableName = "todo_to_do";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->toDo = new \Nemundo\Model\Type\Text\TextType();
$this->toDo->fieldName = "to_do";
$this->toDo->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->toDo->externalTableName = $this->externalTableName;
$this->toDo->aliasFieldName = $this->toDo->tableName . "_" . $this->toDo->fieldName;
$this->toDo->label = "To Do";
$this->addType($this->toDo);

}
}