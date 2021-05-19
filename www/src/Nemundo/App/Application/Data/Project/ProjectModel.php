<?php
namespace Nemundo\App\Application\Data\Project;
class ProjectModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "application_project";
$this->aliasTableName = "application_project";
$this->label = "Project";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "application_project";
$this->id->externalTableName = "application_project";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "application_project_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->project = new \Nemundo\Model\Type\Text\TextType($this);
$this->project->tableName = "application_project";
$this->project->externalTableName = "application_project";
$this->project->fieldName = "project";
$this->project->aliasFieldName = "application_project_project";
$this->project->label = "Project";
$this->project->allowNullValue = false;
$this->project->length = 255;

$this->phpClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->phpClass->tableName = "application_project";
$this->phpClass->externalTableName = "application_project";
$this->phpClass->fieldName = "php_class";
$this->phpClass->aliasFieldName = "application_project_php_class";
$this->phpClass->label = "Php Class";
$this->phpClass->allowNullValue = false;
$this->phpClass->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "php_class";
$index->addType($this->phpClass);

}
}