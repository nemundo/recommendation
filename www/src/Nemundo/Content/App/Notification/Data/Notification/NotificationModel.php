<?php
namespace Nemundo\Content\App\Notification\Data\Notification;
class NotificationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDeleted;

protected function loadModel() {
$this->tableName = "notification_notification";
$this->aliasTableName = "notification_notification";
$this->label = "Notification";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "notification_notification";
$this->id->externalTableName = "notification_notification";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "notification_notification_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "notification_notification";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "notification_notification_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "notification_notification";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "notification_notification_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "notification_notification";
$this->dateTime->externalTableName = "notification_notification";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "notification_notification_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->isDeleted = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->isDeleted->tableName = "notification_notification";
$this->isDeleted->externalTableName = "notification_notification";
$this->isDeleted->fieldName = "is_deleted";
$this->isDeleted->aliasFieldName = "notification_notification_is_deleted";
$this->isDeleted->label = "Is Deleted";
$this->isDeleted->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "user";
$index->addType($this->userId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "notification_notification_user");
$this->user->tableName = "notification_notification";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "notification_notification_user";
$this->user->label = "User";
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "notification_notification_content");
$this->content->tableName = "notification_notification";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "notification_notification_content";
$this->content->label = "Content";
}
return $this;
}
}