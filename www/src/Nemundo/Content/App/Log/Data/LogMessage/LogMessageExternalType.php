<?php
namespace Nemundo\Content\App\Log\Data\LogMessage;
class LogMessageExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LogMessageModel::class;
$this->externalTableName = "log_message";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->message = new \Nemundo\Model\Type\Text\TextType();
$this->message->fieldName = "message";
$this->message->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->message->externalTableName = $this->externalTableName;
$this->message->aliasFieldName = $this->message->tableName . "_" . $this->message->fieldName;
$this->message->label = "Message";
$this->addType($this->message);

}
}