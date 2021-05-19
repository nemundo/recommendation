<?php
namespace Nemundo\Content\App\Log\Data\LogMessage;
class LogMessageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $message;

protected function loadModel() {
$this->tableName = "log_message";
$this->aliasTableName = "log_message";
$this->label = "Log Mesage";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "log_message";
$this->id->externalTableName = "log_message";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "log_message_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "log_message";
$this->dateTime->externalTableName = "log_message";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "log_message_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = true;

$this->message = new \Nemundo\Model\Type\Text\TextType($this);
$this->message->tableName = "log_message";
$this->message->externalTableName = "log_message";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "log_message_message";
$this->message->label = "Message";
$this->message->allowNullValue = true;
$this->message->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "date_time";
$index->addType($this->dateTime);

}
}