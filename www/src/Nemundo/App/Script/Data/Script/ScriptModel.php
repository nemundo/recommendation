<?php
namespace Nemundo\App\Script\Data\Script;
class ScriptModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
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

protected function loadModel() {
$this->tableName = "script_script";
$this->aliasTableName = "script_script";
$this->label = "Script";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "script_script";
$this->id->externalTableName = "script_script";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "script_script_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->scriptName = new \Nemundo\Model\Type\Text\TextType($this);
$this->scriptName->tableName = "script_script";
$this->scriptName->externalTableName = "script_script";
$this->scriptName->fieldName = "script_name";
$this->scriptName->aliasFieldName = "script_script_script_name";
$this->scriptName->label = "Script Name";
$this->scriptName->allowNullValue = true;
$this->scriptName->length = 255;

$this->scriptClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->scriptClass->tableName = "script_script";
$this->scriptClass->externalTableName = "script_script";
$this->scriptClass->fieldName = "script_class";
$this->scriptClass->aliasFieldName = "script_script_script_class";
$this->scriptClass->label = "Script Class";
$this->scriptClass->allowNullValue = false;
$this->scriptClass->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "script_script";
$this->description->externalTableName = "script_script";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "script_script_description";
$this->description->label = "Description";
$this->description->allowNullValue = false;

$this->applicationId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->applicationId->tableName = "script_script";
$this->applicationId->fieldName = "application";
$this->applicationId->aliasFieldName = "script_script_application";
$this->applicationId->label = "Application";
$this->applicationId->allowNullValue = true;

$this->consoleScript = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->consoleScript->tableName = "script_script";
$this->consoleScript->externalTableName = "script_script";
$this->consoleScript->fieldName = "console_script";
$this->consoleScript->aliasFieldName = "script_script_console_script";
$this->consoleScript->label = "Console Script";
$this->consoleScript->allowNullValue = false;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "script_script";
$this->setupStatus->externalTableName = "script_script";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "script_script_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "script_name";
$index->addType($this->scriptClass);

}
public function loadApplication() {
if ($this->application == null) {
$this->application = new \Nemundo\App\Application\Data\Application\ApplicationExternalType($this, "script_script_application");
$this->application->tableName = "script_script";
$this->application->fieldName = "application";
$this->application->aliasFieldName = "script_script_application";
$this->application->label = "Application";
}
return $this;
}
}