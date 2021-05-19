<?php
namespace Nemundo\Content\App\Inbox\Data\Inbox;
class InboxModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
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

protected function loadModel() {
$this->tableName = "inbox_inbox";
$this->aliasTableName = "inbox_inbox";
$this->label = "Inbox";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "inbox_inbox";
$this->id->externalTableName = "inbox_inbox";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "inbox_inbox_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "inbox_inbox";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "inbox_inbox_user";
$this->userId->label = "User";
$this->userId->allowNullValue = true;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "inbox_inbox";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "inbox_inbox_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = true;

$this->deleted = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->deleted->tableName = "inbox_inbox";
$this->deleted->externalTableName = "inbox_inbox";
$this->deleted->fieldName = "deleted";
$this->deleted->aliasFieldName = "inbox_inbox_deleted";
$this->deleted->label = "Deleted";
$this->deleted->allowNullValue = true;

$this->fromId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->fromId->tableName = "inbox_inbox";
$this->fromId->fieldName = "from";
$this->fromId->aliasFieldName = "inbox_inbox_from";
$this->fromId->label = "From";
$this->fromId->allowNullValue = true;

$this->message = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->message->tableName = "inbox_inbox";
$this->message->externalTableName = "inbox_inbox";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "inbox_inbox_message";
$this->message->label = "Message";
$this->message->allowNullValue = true;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "inbox_inbox";
$this->dateTime->externalTableName = "inbox_inbox";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "inbox_inbox_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "inbox_inbox_user");
$this->user->tableName = "inbox_inbox";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "inbox_inbox_user";
$this->user->label = "User";
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "inbox_inbox_content");
$this->content->tableName = "inbox_inbox";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "inbox_inbox_content";
$this->content->label = "Content";
}
return $this;
}
public function loadFrom() {
if ($this->from == null) {
$this->from = new \Nemundo\User\Data\User\UserExternalType($this, "inbox_inbox_from");
$this->from->tableName = "inbox_inbox";
$this->from->fieldName = "from";
$this->from->aliasFieldName = "inbox_inbox_from";
$this->from->label = "From";
}
return $this;
}
}