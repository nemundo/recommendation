<?php
namespace Nemundo\Content\Index\Log\Data\Log;
class LogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentLogId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $contentLog;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentItemId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $contentItem;

protected function loadModel() {
$this->tableName = "content_log";
$this->aliasTableName = "content_log";
$this->label = "Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_log";
$this->id->externalTableName = "content_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "content_log";
$this->dateTime->externalTableName = "content_log";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "content_log_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = true;

$this->contentLogId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentLogId->tableName = "content_log";
$this->contentLogId->fieldName = "content_log";
$this->contentLogId->aliasFieldName = "content_log_content_log";
$this->contentLogId->label = "Content Log";
$this->contentLogId->allowNullValue = true;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "content_log";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "content_log_user";
$this->userId->label = "User";
$this->userId->allowNullValue = true;

$this->contentItemId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentItemId->tableName = "content_log";
$this->contentItemId->fieldName = "content_item";
$this->contentItemId->aliasFieldName = "content_log_content_item";
$this->contentItemId->label = "Content Item";
$this->contentItemId->allowNullValue = true;

}
public function loadContentLog() {
if ($this->contentLog == null) {
$this->contentLog = new \Nemundo\Content\Data\Content\ContentExternalType($this, "content_log_content_log");
$this->contentLog->tableName = "content_log";
$this->contentLog->fieldName = "content_log";
$this->contentLog->aliasFieldName = "content_log_content_log";
$this->contentLog->label = "Content Log";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "content_log_user");
$this->user->tableName = "content_log";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "content_log_user";
$this->user->label = "User";
}
return $this;
}
public function loadContentItem() {
if ($this->contentItem == null) {
$this->contentItem = new \Nemundo\Content\Data\Content\ContentExternalType($this, "content_log_content_item");
$this->contentItem->tableName = "content_log";
$this->contentItem->fieldName = "content_item";
$this->contentItem->aliasFieldName = "content_log_content_item";
$this->contentItem->label = "Content Item";
}
return $this;
}
}