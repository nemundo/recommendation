<?php
namespace Nemundo\Content\App\Feedback\Data\Feedback;
class FeedbackExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = FeedbackModel::class;
$this->externalTableName = "feedback_feedback";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->contact = new \Nemundo\Model\Type\Text\TextType();
$this->contact->fieldName = "contact";
$this->contact->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contact->externalTableName = $this->externalTableName;
$this->contact->aliasFieldName = $this->contact->tableName . "_" . $this->contact->fieldName;
$this->contact->label = "Contact";
$this->addType($this->contact);

$this->email = new \Nemundo\Model\Type\Text\TextType();
$this->email->fieldName = "email";
$this->email->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->email->externalTableName = $this->externalTableName;
$this->email->aliasFieldName = $this->email->tableName . "_" . $this->email->fieldName;
$this->email->label = "eMail";
$this->addType($this->email);

$this->message = new \Nemundo\Model\Type\Text\LargeTextType();
$this->message->fieldName = "message";
$this->message->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->message->externalTableName = $this->externalTableName;
$this->message->aliasFieldName = $this->message->tableName . "_" . $this->message->fieldName;
$this->message->label = "Message";
$this->addType($this->message);

}
}