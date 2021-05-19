<?php
namespace Nemundo\Content\App\Project\Data\Project;
class ProjectExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $project;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ProjectModel::class;
$this->externalTableName = "project_project";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->project = new \Nemundo\Model\Type\Text\TextType();
$this->project->fieldName = "project";
$this->project->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->project->externalTableName = $this->externalTableName;
$this->project->aliasFieldName = $this->project->tableName . "_" . $this->project->fieldName;
$this->project->label = "Project";
$this->addType($this->project);

}
}