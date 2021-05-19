<?php
namespace Nemundo\Content\App\Feedback\Data\Feedback;
class FeedbackModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $contact;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $email;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $message;

protected function loadModel() {
$this->tableName = "feedback_feedback";
$this->aliasTableName = "feedback_feedback";
$this->label = "Feedback";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "feedback_feedback";
$this->id->externalTableName = "feedback_feedback";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "feedback_feedback_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contact = new \Nemundo\Model\Type\Text\TextType($this);
$this->contact->tableName = "feedback_feedback";
$this->contact->externalTableName = "feedback_feedback";
$this->contact->fieldName = "contact";
$this->contact->aliasFieldName = "feedback_feedback_contact";
$this->contact->label = "Contact";
$this->contact->allowNullValue = false;
$this->contact->length = 255;

$this->email = new \Nemundo\Model\Type\Text\TextType($this);
$this->email->tableName = "feedback_feedback";
$this->email->externalTableName = "feedback_feedback";
$this->email->fieldName = "email";
$this->email->aliasFieldName = "feedback_feedback_email";
$this->email->label = "eMail";
$this->email->allowNullValue = false;
$this->email->length = 255;

$this->message = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->message->tableName = "feedback_feedback";
$this->message->externalTableName = "feedback_feedback";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "feedback_feedback_message";
$this->message->label = "Message";
$this->message->allowNullValue = false;

}
}