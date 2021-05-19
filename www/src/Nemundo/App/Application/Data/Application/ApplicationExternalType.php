<?php
namespace Nemundo\App\Application\Data\Application;
class ApplicationExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ApplicationModel::class;
$this->externalTableName = "application_application";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->application = new \Nemundo\Model\Type\Text\TextType();
$this->application->fieldName = "application";
$this->application->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->application->externalTableName = $this->externalTableName;
$this->application->aliasFieldName = $this->application->tableName . "_" . $this->application->fieldName;
$this->application->label = "Application";
$this->addType($this->application);

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType();
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->setupStatus->externalTableName = $this->externalTableName;
$this->setupStatus->aliasFieldName = $this->setupStatus->tableName . "_" . $this->setupStatus->fieldName;
$this->setupStatus->label = "Setup Status";
$this->addType($this->setupStatus);

$this->applicationClass = new \Nemundo\Model\Type\Text\TextType();
$this->applicationClass->fieldName = "application_class";
$this->applicationClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->applicationClass->externalTableName = $this->externalTableName;
$this->applicationClass->aliasFieldName = $this->applicationClass->tableName . "_" . $this->applicationClass->fieldName;
$this->applicationClass->label = "Application Class";
$this->addType($this->applicationClass);

$this->install = new \Nemundo\Model\Type\Number\YesNoType();
$this->install->fieldName = "install";
$this->install->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->install->externalTableName = $this->externalTableName;
$this->install->aliasFieldName = $this->install->tableName . "_" . $this->install->fieldName;
$this->install->label = "Install";
$this->addType($this->install);

$this->projectId = new \Nemundo\Model\Type\Id\IdType();
$this->projectId->fieldName = "project";
$this->projectId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->projectId->aliasFieldName = $this->projectId->tableName ."_".$this->projectId->fieldName;
$this->projectId->label = "Project";
$this->addType($this->projectId);

$this->appMenu = new \Nemundo\Model\Type\Number\YesNoType();
$this->appMenu->fieldName = "app_menu";
$this->appMenu->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appMenu->externalTableName = $this->externalTableName;
$this->appMenu->aliasFieldName = $this->appMenu->tableName . "_" . $this->appMenu->fieldName;
$this->appMenu->label = "App Menu";
$this->addType($this->appMenu);

$this->adminMenu = new \Nemundo\Model\Type\Number\YesNoType();
$this->adminMenu->fieldName = "admin_menu";
$this->adminMenu->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->adminMenu->externalTableName = $this->externalTableName;
$this->adminMenu->aliasFieldName = $this->adminMenu->tableName . "_" . $this->adminMenu->fieldName;
$this->adminMenu->label = "Admin Menu";
$this->addType($this->adminMenu);

}
public function loadProject() {
if ($this->project == null) {
$this->project = new \Nemundo\App\Application\Data\Project\ProjectExternalType(null, $this->parentFieldName . "_project");
$this->project->fieldName = "project";
$this->project->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->project->aliasFieldName = $this->project->tableName ."_".$this->project->fieldName;
$this->project->label = "Project";
$this->addType($this->project);
}
return $this;
}
}