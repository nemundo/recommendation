<?php
namespace Nemundo\App\Mail\Data\MailQueue;
class MailQueueExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $send;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTimeSend;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $mailTo;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $text;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTimeCreated;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = MailQueueModel::class;
$this->externalTableName = "mail_queue";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->send = new \Nemundo\Model\Type\Number\YesNoType();
$this->send->fieldName = "send";
$this->send->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->send->externalTableName = $this->externalTableName;
$this->send->aliasFieldName = $this->send->tableName . "_" . $this->send->fieldName;
$this->send->label = "Send";
$this->addType($this->send);

$this->dateTimeSend = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTimeSend->fieldName = "date_time_send";
$this->dateTimeSend->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeSend->externalTableName = $this->externalTableName;
$this->dateTimeSend->aliasFieldName = $this->dateTimeSend->tableName . "_" . $this->dateTimeSend->fieldName;
$this->dateTimeSend->label = "Date Time Send";
$this->addType($this->dateTimeSend);

$this->mailTo = new \Nemundo\Model\Type\Text\TextType();
$this->mailTo->fieldName = "mail_to";
$this->mailTo->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mailTo->externalTableName = $this->externalTableName;
$this->mailTo->aliasFieldName = $this->mailTo->tableName . "_" . $this->mailTo->fieldName;
$this->mailTo->label = "Mail To";
$this->addType($this->mailTo);

$this->subject = new \Nemundo\Model\Type\Text\TextType();
$this->subject->fieldName = "subject";
$this->subject->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->subject->externalTableName = $this->externalTableName;
$this->subject->aliasFieldName = $this->subject->tableName . "_" . $this->subject->fieldName;
$this->subject->label = "Subject";
$this->addType($this->subject);

$this->text = new \Nemundo\Model\Type\Text\LargeTextType();
$this->text->fieldName = "text";
$this->text->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->text->externalTableName = $this->externalTableName;
$this->text->aliasFieldName = $this->text->tableName . "_" . $this->text->fieldName;
$this->text->label = "Text";
$this->addType($this->text);

$this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTimeCreated->fieldName = "date_time_created";
$this->dateTimeCreated->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeCreated->externalTableName = $this->externalTableName;
$this->dateTimeCreated->aliasFieldName = $this->dateTimeCreated->tableName . "_" . $this->dateTimeCreated->fieldName;
$this->dateTimeCreated->label = "Date Time Created";
$this->addType($this->dateTimeCreated);

}
}