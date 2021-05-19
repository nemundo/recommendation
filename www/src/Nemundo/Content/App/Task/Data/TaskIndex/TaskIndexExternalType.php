<?php
namespace Nemundo\Content\App\Task\Data\TaskIndex;
class TaskIndexExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $task;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $deadline;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TaskIndexModel::class;
$this->externalTableName = "task_task_index";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->task = new \Nemundo\Model\Type\Text\TextType();
$this->task->fieldName = "task";
$this->task->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->task->externalTableName = $this->externalTableName;
$this->task->aliasFieldName = $this->task->tableName . "_" . $this->task->fieldName;
$this->task->label = "Task";
$this->addType($this->task);

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType();
$this->deadline->fieldName = "deadline";
$this->deadline->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->deadline->externalTableName = $this->externalTableName;
$this->deadline->aliasFieldName = $this->deadline->tableName . "_" . $this->deadline->fieldName;
$this->deadline->label = "Deadline";
$this->addType($this->deadline);

$this->contentId = new \Nemundo\Model\Type\Id\IdType();
$this->contentId->fieldName = "content";
$this->contentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentId->aliasFieldName = $this->contentId->tableName ."_".$this->contentId->fieldName;
$this->contentId->label = "Content";
$this->addType($this->contentId);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content");
$this->content->fieldName = "content";
$this->content->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->content->aliasFieldName = $this->content->tableName ."_".$this->content->fieldName;
$this->content->label = "Content";
$this->addType($this->content);
}
return $this;
}
}