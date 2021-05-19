<?php
namespace Nemundo\App\SystemLog\Data\Log;
class LogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $applicationId;

/**
* @var \Nemundo\App\Application\Data\Application\ApplicationExternalType
*/
public $application;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
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

protected function loadModel() {
$this->tableName = "systemlog_log";
$this->aliasTableName = "systemlog_log";
$this->label = "Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "systemlog_log";
$this->id->externalTableName = "systemlog_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "systemlog_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->applicationId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->applicationId->tableName = "systemlog_log";
$this->applicationId->fieldName = "application";
$this->applicationId->aliasFieldName = "systemlog_log_application";
$this->applicationId->label = "Application";
$this->applicationId->allowNullValue = true;

$this->logTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->logTypeId->tableName = "systemlog_log";
$this->logTypeId->fieldName = "log_type";
$this->logTypeId->aliasFieldName = "systemlog_log_log_type";
$this->logTypeId->label = "Log Type";
$this->logTypeId->allowNullValue = false;

$this->message = new \Nemundo\Model\Type\Text\TextType($this);
$this->message->tableName = "systemlog_log";
$this->message->externalTableName = "systemlog_log";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "systemlog_log_message";
$this->message->label = "Message";
$this->message->allowNullValue = false;
$this->message->length = 255;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "systemlog_log";
$this->dateTime->externalTableName = "systemlog_log";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "systemlog_log_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "application_date_time";
$index->addType($this->applicationId);

}
public function loadApplication() {
if ($this->application == null) {
$this->application = new \Nemundo\App\Application\Data\Application\ApplicationExternalType($this, "systemlog_log_application");
$this->application->tableName = "systemlog_log";
$this->application->fieldName = "application";
$this->application->aliasFieldName = "systemlog_log_application";
$this->application->label = "Application";
}
return $this;
}
public function loadLogType() {
if ($this->logType == null) {
$this->logType = new \Nemundo\App\SystemLog\Data\LogType\LogTypeExternalType($this, "systemlog_log_log_type");
$this->logType->tableName = "systemlog_log";
$this->logType->fieldName = "log_type";
$this->logType->aliasFieldName = "systemlog_log_log_type";
$this->logType->label = "Log Type";
}
return $this;
}
}