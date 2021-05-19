<?php
namespace Nemundo\Content\App\Project\Data\Project;
class ProjectModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $project;

protected function loadModel() {
$this->tableName = "project_project";
$this->aliasTableName = "project_project";
$this->label = "Project";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "project_project";
$this->id->externalTableName = "project_project";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "project_project_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->project = new \Nemundo\Model\Type\Text\TextType($this);
$this->project->tableName = "project_project";
$this->project->externalTableName = "project_project";
$this->project->fieldName = "project";
$this->project->aliasFieldName = "project_project_project";
$this->project->label = "Project";
$this->project->allowNullValue = true;
$this->project->length = 255;

}
}