<?php
namespace Nemundo\App\Mail\Data\MailQueue;
class MailQueueModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "mail_queue";
$this->aliasTableName = "mail_queue";
$this->label = "Mail Queue";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "mail_queue";
$this->id->externalTableName = "mail_queue";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "mail_queue_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->send = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->send->tableName = "mail_queue";
$this->send->externalTableName = "mail_queue";
$this->send->fieldName = "send";
$this->send->aliasFieldName = "mail_queue_send";
$this->send->label = "Send";
$this->send->allowNullValue = false;

$this->dateTimeSend = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTimeSend->tableName = "mail_queue";
$this->dateTimeSend->externalTableName = "mail_queue";
$this->dateTimeSend->fieldName = "date_time_send";
$this->dateTimeSend->aliasFieldName = "mail_queue_date_time_send";
$this->dateTimeSend->label = "Date Time Send";
$this->dateTimeSend->allowNullValue = true;

$this->mailTo = new \Nemundo\Model\Type\Text\TextType($this);
$this->mailTo->tableName = "mail_queue";
$this->mailTo->externalTableName = "mail_queue";
$this->mailTo->fieldName = "mail_to";
$this->mailTo->aliasFieldName = "mail_queue_mail_to";
$this->mailTo->label = "Mail To";
$this->mailTo->allowNullValue = false;
$this->mailTo->length = 255;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "mail_queue";
$this->subject->externalTableName = "mail_queue";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "mail_queue_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = false;
$this->subject->length = 255;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "mail_queue";
$this->text->externalTableName = "mail_queue";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "mail_queue_text";
$this->text->label = "Text";
$this->text->allowNullValue = false;

$this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTimeCreated->tableName = "mail_queue";
$this->dateTimeCreated->externalTableName = "mail_queue";
$this->dateTimeCreated->fieldName = "date_time_created";
$this->dateTimeCreated->aliasFieldName = "mail_queue_date_time_created";
$this->dateTimeCreated->label = "Date Time Created";
$this->dateTimeCreated->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "send";
$index->addType($this->send);

}
}