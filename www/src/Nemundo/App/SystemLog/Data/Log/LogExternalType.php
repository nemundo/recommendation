<?php
namespace Nemundo\App\SystemLog\Data\Log;
class LogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $applicationId;

/**
* @var \Nemundo\App\Application\Data\Application\ApplicationExternalType
*/
public $application;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $logTypeId;

/**
* @var \Nemundo\App\SystemLog\Data\LogType\LogTypeExternalType
*/
public $logType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $message;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LogModel::class;
$this->externalTableName = "systemlog_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->applicationId = new \Nemundo\Model\Type\Id\IdType();
$this->applicationId->fieldName = "application";
$this->applicationId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->applicationId->aliasFieldName = $this->applicationId->tableName ."_".$this->applicationId->fieldName;
$this->applicationId->label = "Application";
$this->addType($this->applicationId);

$this->logTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->logTypeId->fieldName = "log_type";
$this->logTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->logTypeId->aliasFieldName = $this->logTypeId->tableName ."_".$this->logTypeId->fieldName;
$this->logTypeId->label = "Log Type";
$this->addType($this->logTypeId);

$this->message = new \Nemundo\Model\Type\Text\TextType();
$this->message->fieldName = "message";
$this->message->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->message->externalTableName = $this->externalTableName;
$this->message->aliasFieldName = $this->message->tableName . "_" . $this->message->fieldName;
$this->message->label = "Message";
$this->addType($this->message);

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

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
public function loadLogType() {
if ($this->logType == null) {
$this->logType = new \Nemundo\App\SystemLog\Data\LogType\LogTypeExternalType(null, $this->parentFieldName . "_log_type");
$this->logType->fieldName = "log_type";
$this->logType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->logType->aliasFieldName = $this->logType->tableName ."_".$this->logType->fieldName;
$this->logType->label = "Log Type";
$this->addType($this->logType);
}
return $this;
}
}