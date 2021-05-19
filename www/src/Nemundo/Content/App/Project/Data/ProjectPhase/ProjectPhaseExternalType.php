<?php
namespace Nemundo\Content\App\Project\Data\ProjectPhase;
class ProjectPhaseExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $projectId;

/**
* @var \Nemundo\Content\App\Project\Data\Project\ProjectExternalType
*/
public $project;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $projectPhase;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ProjectPhaseModel::class;
$this->externalTableName = "project_project_phase";
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

$this->projectPhase = new \Nemundo\Model\Type\Text\TextType();
$this->projectPhase->fieldName = "project_phase";
$this->projectPhase->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->projectPhase->externalTableName = $this->externalTableName;
$this->projectPhase->aliasFieldName = $this->projectPhase->tableName . "_" . $this->projectPhase->fieldName;
$this->projectPhase->label = "Project Phase";
$this->addType($this->projectPhase);

}
public function loadProject() {
if ($this->project == null) {
$this->project = new \Nemundo\Content\App\Project\Data\Project\ProjectExternalType(null, $this->parentFieldName . "_project");
$this->project->fieldName = "project";
$this->project->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->project->aliasFieldName = $this->project->tableName ."_".$this->project->fieldName;
$this->project->label = "Project";
$this->addType($this->project);
}
return $this;
}
}