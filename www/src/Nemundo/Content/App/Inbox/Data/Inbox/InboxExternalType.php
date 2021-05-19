<?php
namespace Nemundo\Content\App\Inbox\Data\Inbox;
class InboxExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $deleted;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $fromId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $from;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $message;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = InboxModel::class;
$this->externalTableName = "inbox_inbox";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->userId = new \Nemundo\Model\Type\Id\IdType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->contentId = new \Nemundo\Model\Type\Id\IdType();
$this->contentId->fieldName = "content";
$this->contentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentId->aliasFieldName = $this->contentId->tableName ."_".$this->contentId->fieldName;
$this->contentId->label = "Content";
$this->addType($this->contentId);

$this->deleted = new \Nemundo\Model\Type\Number\YesNoType();
$this->deleted->fieldName = "deleted";
$this->deleted->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->deleted->externalTableName = $this->externalTableName;
$this->deleted->aliasFieldName = $this->deleted->tableName . "_" . $this->deleted->fieldName;
$this->deleted->label = "Deleted";
$this->addType($this->deleted);

$this->fromId = new \Nemundo\Model\Type\Id\IdType();
$this->fromId->fieldName = "from";
$this->fromId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fromId->aliasFieldName = $this->fromId->tableName ."_".$this->fromId->fieldName;
$this->fromId->label = "From";
$this->addType($this->fromId);

$this->message = new \Nemundo\Model\Type\Text\LargeTextType();
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
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content");
$this->content->fieldName = "content";
$this->content->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->content->aliasFieldName = $this->content->tableName ."_".$this->content->fieldName;
$this->content->label = "Content";
$this->addType($this->content);
}
return $this;
}
public function loadFrom() {
if ($this->from == null) {
$this->from = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_from");
$this->from->fieldName = "from";
$this->from->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->from->aliasFieldName = $this->from->tableName ."_".$this->from->fieldName;
$this->from->label = "From";
$this->addType($this->from);
}
return $this;
}
}