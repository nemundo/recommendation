<?php
namespace Nemundo\Content\App\SystemLog\Data\SystemLog;
class SystemLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $message;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

protected function loadModel() {
$this->tableName = "systemlog_system_log";
$this->aliasTableName = "systemlog_system_log";
$this->label = "System Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "systemlog_system_log";
$this->id->externalTableName = "systemlog_system_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "systemlog_system_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->message = new \Nemundo\Model\Type\Text\TextType($this);
$this->message->tableName = "systemlog_system_log";
$this->message->externalTableName = "systemlog_system_log";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "systemlog_system_log_message";
$this->message->label = "Message";
$this->message->allowNullValue = false;
$this->message->length = 255;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "systemlog_system_log";
$this->dateTime->externalTableName = "systemlog_system_log";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "systemlog_system_log_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

}
}