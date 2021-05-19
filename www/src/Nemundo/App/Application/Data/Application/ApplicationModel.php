<?php
namespace Nemundo\App\Application\Data\Application;
class ApplicationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $application;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $applicationClass;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $install;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $projectId;

/**
* @var \Nemundo\App\Application\Data\Project\ProjectExternalType
*/
public $project;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $appMenu;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $adminMenu;

protected function loadModel() {
$this->tableName = "application_application";
$this->aliasTableName = "application_application";
$this->label = "Application";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "application_application";
$this->id->externalTableName = "application_application";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "application_application_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->application = new \Nemundo\Model\Type\Text\TextType($this);
$this->application->tableName = "application_application";
$this->application->externalTableName = "application_application";
$this->application->fieldName = "application";
$this->application->aliasFieldName = "application_application_application";
$this->application->label = "Application";
$this->application->allowNullValue = false;
$this->application->length = 255;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "application_application";
$this->setupStatus->externalTableName = "application_application";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "application_application_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = false;

$this->applicationClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->applicationClass->tableName = "application_application";
$this->applicationClass->externalTableName = "application_application";
$this->applicationClass->fieldName = "application_class";
$this->applicationClass->aliasFieldName = "application_application_application_class";
$this->applicationClass->label = "Application Class";
$this->applicationClass->allowNullValue = false;
$this->applicationClass->length = 255;

$this->install = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->install->tableName = "application_application";
$this->install->externalTableName = "application_application";
$this->install->fieldName = "install";
$this->install->aliasFieldName = "application_application_install";
$this->install->label = "Install";
$this->install->allowNullValue = false;

$this->projectId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->projectId->tableName = "application_application";
$this->projectId->fieldName = "project";
$this->projectId->aliasFieldName = "application_application_project";
$this->projectId->label = "Project";
$this->projectId->allowNullValue = true;

$this->appMenu = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->appMenu->tableName = "application_application";
$this->appMenu->externalTableName = "application_application";
$this->appMenu->fieldName = "app_menu";
$this->appMenu->aliasFieldName = "application_application_app_menu";
$this->appMenu->label = "App Menu";
$this->appMenu->allowNullValue = false;

$this->adminMenu = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->adminMenu->tableName = "application_application";
$this->adminMenu->externalTableName = "application_application";
$this->adminMenu->fieldName = "admin_menu";
$this->adminMenu->aliasFieldName = "application_application_admin_menu";
$this->adminMenu->label = "Admin Menu";
$this->adminMenu->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "install_application";
$index->addType($this->install);
$index->addType($this->application);

}
public function loadProject() {
if ($this->project == null) {
$this->project = new \Nemundo\App\Application\Data\Project\ProjectExternalType($this, "application_application_project");
$this->project->tableName = "application_application";
$this->project->fieldName = "project";
$this->project->aliasFieldName = "application_application_project";
$this->project->label = "Project";
}
return $this;
}
}