<?php
namespace Nemundo\Content\App\Text\Data\VersionLargeText;
class VersionLargeTextModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $largeText;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

protected function loadModel() {
$this->tableName = "text_version_large_text";
$this->aliasTableName = "text_version_large_text";
$this->label = "Version Large Text";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "text_version_large_text";
$this->id->externalTableName = "text_version_large_text";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "text_version_large_text_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "text_version_large_text";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "text_version_large_text_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = true;

$this->largeText = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->largeText->tableName = "text_version_large_text";
$this->largeText->externalTableName = "text_version_large_text";
$this->largeText->fieldName = "large_text";
$this->largeText->aliasFieldName = "text_version_large_text_large_text";
$this->largeText->label = "Large Text";
$this->largeText->allowNullValue = true;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "text_version_large_text";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "text_version_large_text_user";
$this->userId->label = "User";
$this->userId->allowNullValue = true;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "text_version_large_text";
$this->dateTime->externalTableName = "text_version_large_text";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "text_version_large_text_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = true;

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "text_version_large_text_content");
$this->content->tableName = "text_version_large_text";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "text_version_large_text_content";
$this->content->label = "Content";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "text_version_large_text_user");
$this->user->tableName = "text_version_large_text";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "text_version_large_text_user";
$this->user->label = "User";
}
return $this;
}
}