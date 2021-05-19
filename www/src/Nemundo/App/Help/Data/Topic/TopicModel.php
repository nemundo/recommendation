<?php
namespace Nemundo\App\Help\Data\Topic;
class TopicModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $projectId;

/**
* @var \Nemundo\App\Help\Data\Project\ProjectExternalType
*/
public $project;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $topic;

protected function loadModel() {
$this->tableName = "help_topic";
$this->aliasTableName = "help_topic";
$this->label = "Topic";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "help_topic";
$this->id->externalTableName = "help_topic";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "help_topic_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->projectId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->projectId->tableName = "help_topic";
$this->projectId->fieldName = "project";
$this->projectId->aliasFieldName = "help_topic_project";
$this->projectId->label = "Project";
$this->projectId->allowNullValue = false;

$this->topic = new \Nemundo\Model\Type\Text\TextType($this);
$this->topic->tableName = "help_topic";
$this->topic->externalTableName = "help_topic";
$this->topic->fieldName = "topic";
$this->topic->aliasFieldName = "help_topic_topic";
$this->topic->label = "Topic";
$this->topic->allowNullValue = false;
$this->topic->length = 255;

}
public function loadProject() {
if ($this->project == null) {
$this->project = new \Nemundo\App\Help\Data\Project\ProjectExternalType($this, "help_topic_project");
$this->project->tableName = "help_topic";
$this->project->fieldName = "project";
$this->project->aliasFieldName = "help_topic_project";
$this->project->label = "Project";
}
return $this;
}
}