<?php
namespace Nemundo\App\Application\Data\Project;
class ProjectExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $project;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phpClass;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ProjectModel::class;
$this->externalTableName = "application_project";
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

$this->phpClass = new \Nemundo\Model\Type\Text\TextType();
$this->phpClass->fieldName = "php_class";
$this->phpClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->phpClass->externalTableName = $this->externalTableName;
$this->phpClass->aliasFieldName = $this->phpClass->tableName . "_" . $this->phpClass->fieldName;
$this->phpClass->label = "Php Class";
$this->addType($this->phpClass);

}
}