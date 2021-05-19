<?php
namespace Nemundo\App\Script\Data\Script;
class ScriptExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $scriptName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $scriptClass;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $applicationId;

/**
* @var \Nemundo\App\Application\Data\Application\ApplicationExternalType
*/
public $application;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $consoleScript;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ScriptModel::class;
$this->externalTableName = "script_script";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->scriptName = new \Nemundo\Model\Type\Text\TextType();
$this->scriptName->fieldName = "script_name";
$this->scriptName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->scriptName->externalTableName = $this->externalTableName;
$this->scriptName->aliasFieldName = $this->scriptName->tableName . "_" . $this->scriptName->fieldName;
$this->scriptName->label = "Script Name";
$this->addType($this->scriptName);

$this->scriptClass = new \Nemundo\Model\Type\Text\TextType();
$this->scriptClass->fieldName = "script_class";
$this->scriptClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->scriptClass->externalTableName = $this->externalTableName;
$this->scriptClass->aliasFieldName = $this->scriptClass->tableName . "_" . $this->scriptClass->fieldName;
$this->scriptClass->label = "Script Class";
$this->addType($this->scriptClass);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->externalTableName = $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Description";
$this->addType($this->description);

$this->applicationId = new \Nemundo\Model\Type\Id\IdType();
$this->applicationId->fieldName = "application";
$this->applicationId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->applicationId->aliasFieldName = $this->applicationId->tableName ."_".$this->applicationId->fieldName;
$this->applicationId->label = "Application";
$this->addType($this->applicationId);

$this->consoleScript = new \Nemundo\Model\Type\Number\YesNoType();
$this->consoleScript->fieldName = "console_script";
$this->consoleScript->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->consoleScript->externalTableName = $this->externalTableName;
$this->consoleScript->aliasFieldName = $this->consoleScript->tableName . "_" . $this->consoleScript->fieldName;
$this->consoleScript->label = "Console Script";
$this->addType($this->consoleScript);

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType();
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->setupStatus->externalTableName = $this->externalTableName;
$this->setupStatus->aliasFieldName = $this->setupStatus->tableName . "_" . $this->setupStatus->fieldName;
$this->setupStatus->label = "Setup Status";
$this->addType($this->setupStatus);

}
public function loadApplication() {
if ($this->application == null) {
$this->application = new \Nemundo\App\Application\Data\Application\ApplicationExternalType(null, $this->parentFieldName . "_application");
$this->application->fieldName = "application";
$this->application->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->application->aliasFieldName = $this->application->tableName ."_".$this->application->fieldName;
$this->application->label = "Application";
$this->addType($this->application);
}
return $this;
}
}