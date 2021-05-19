<?php
namespace Nemundo\Content\App\Project\Data\ProjectPhase;
class ProjectPhaseModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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

protected function loadModel() {
$this->tableName = "project_project_phase";
$this->aliasTableName = "project_project_phase";
$this->label = "Project Phase";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "project_project_phase";
$this->id->externalTableName = "project_project_phase";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "project_project_phase_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->projectId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->projectId->tableName = "project_project_phase";
$this->projectId->fieldName = "project";
$this->projectId->aliasFieldName = "project_project_phase_project";
$this->projectId->label = "Project";
$this->projectId->allowNullValue = true;

$this->projectPhase = new \Nemundo\Model\Type\Text\TextType($this);
$this->projectPhase->tableName = "project_project_phase";
$this->projectPhase->externalTableName = "project_project_phase";
$this->projectPhase->fieldName = "project_phase";
$this->projectPhase->aliasFieldName = "project_project_phase_project_phase";
$this->projectPhase->label = "Project Phase";
$this->projectPhase->allowNullValue = true;
$this->projectPhase->length = 255;

}
public function loadProject() {
if ($this->project == null) {
$this->project = new \Nemundo\Content\App\Project\Data\Project\ProjectExternalType($this, "project_project_phase_project");
$this->project->tableName = "project_project_phase";
$this->project->fieldName = "project";
$this->project->aliasFieldName = "project_project_phase_project";
$this->project->label = "Project";
}
return $this;
}
}