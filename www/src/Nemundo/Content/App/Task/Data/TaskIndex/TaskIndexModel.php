<?php
namespace Nemundo\Content\App\Task\Data\TaskIndex;
class TaskIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

protected function loadModel() {
$this->tableName = "task_task_index";
$this->aliasTableName = "task_task_index";
$this->label = "Task Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "task_task_index";
$this->id->externalTableName = "task_task_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "task_task_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->task = new \Nemundo\Model\Type\Text\TextType($this);
$this->task->tableName = "task_task_index";
$this->task->externalTableName = "task_task_index";
$this->task->fieldName = "task";
$this->task->aliasFieldName = "task_task_index_task";
$this->task->label = "Task";
$this->task->allowNullValue = true;
$this->task->length = 255;

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->deadline->tableName = "task_task_index";
$this->deadline->externalTableName = "task_task_index";
$this->deadline->fieldName = "deadline";
$this->deadline->aliasFieldName = "task_task_index_deadline";
$this->deadline->label = "Deadline";
$this->deadline->allowNullValue = true;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "task_task_index";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "task_task_index_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = true;

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "task_task_index_content");
$this->content->tableName = "task_task_index";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "task_task_index_content";
$this->content->label = "Content";
}
return $this;
}
}