<?php
namespace Nemundo\Content\Index\Log\Data\Log;
class LogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentItemId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $contentItem;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LogModel::class;
$this->externalTableName = "content_log";
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

$this->contentLogId = new \Nemundo\Model\Type\Id\IdType();
$this->contentLogId->fieldName = "content_log";
$this->contentLogId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentLogId->aliasFieldName = $this->contentLogId->tableName ."_".$this->contentLogId->fieldName;
$this->contentLogId->label = "Content Log";
$this->addType($this->contentLogId);

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->contentItemId = new \Nemundo\Model\Type\Id\IdType();
$this->contentItemId->fieldName = "content_item";
$this->contentItemId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentItemId->aliasFieldName = $this->contentItemId->tableName ."_".$this->contentItemId->fieldName;
$this->contentItemId->label = "Content Item";
$this->addType($this->contentItemId);

}
public function loadContentLog() {
if ($this->contentLog == null) {
$this->contentLog = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content_log");
$this->contentLog->fieldName = "content_log";
$this->contentLog->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentLog->aliasFieldName = $this->contentLog->tableName ."_".$this->contentLog->fieldName;
$this->contentLog->label = "Content Log";
$this->addType($this->contentLog);
}
return $this;
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
public function loadContentItem() {
if ($this->contentItem == null) {
$this->contentItem = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content_item");
$this->contentItem->fieldName = "content_item";
$this->contentItem->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentItem->aliasFieldName = $this->contentItem->tableName ."_".$this->contentItem->fieldName;
$this->contentItem->label = "Content Item";
$this->addType($this->contentItem);
}
return $this;
}
}