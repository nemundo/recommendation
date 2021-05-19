<?php
namespace Nemundo\App\Help\Data\Topic;
class TopicExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TopicModel::class;
$this->externalTableName = "help_topic";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->projectId = new \Nemundo\Model\Type\Id\IdType();
$this->projectId->fieldName = "project";
$this->projectId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->projectId->aliasFieldName = $this->projectId->tableName ."_".$this->projectId->fieldName;
$this->projectId->label = "Project";
$this->addType($this->projectId);

$this->topic = new \Nemundo\Model\Type\Text\TextType();
$this->topic->fieldName = "topic";
$this->topic->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->topic->externalTableName = $this->externalTableName;
$this->topic->aliasFieldName = $this->topic->tableName . "_" . $this->topic->fieldName;
$this->topic->label = "Topic";
$this->addType($this->topic);

}
public function loadProject() {
if ($this->project == null) {
$this->project = new \Nemundo\App\Help\Data\Project\ProjectExternalType(null, $this->parentFieldName . "_project");
$this->project->fieldName = "project";
$this->project->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->project->aliasFieldName = $this->project->tableName ."_".$this->project->fieldName;
$this->project->label = "Project";
$this->addType($this->project);
}
return $this;
}
}