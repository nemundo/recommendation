<?php
namespace Nemundo\Content\App\Text\Data\VersionText;
class VersionTextModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $versionText;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $version;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $textId;

/**
* @var \Nemundo\Content\App\Text\Data\Text\TextExternalType
*/
public $text;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadModel() {
$this->tableName = "text_version_text";
$this->aliasTableName = "text_version_text";
$this->label = "Version Text";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "text_version_text";
$this->id->externalTableName = "text_version_text";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "text_version_text_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->versionText = new \Nemundo\Model\Type\Text\TextType($this);
$this->versionText->tableName = "text_version_text";
$this->versionText->externalTableName = "text_version_text";
$this->versionText->fieldName = "version_text";
$this->versionText->aliasFieldName = "text_version_text_version_text";
$this->versionText->label = "Version Text";
$this->versionText->allowNullValue = true;
$this->versionText->length = 255;

$this->version = new \Nemundo\Model\Type\Number\NumberType($this);
$this->version->tableName = "text_version_text";
$this->version->externalTableName = "text_version_text";
$this->version->fieldName = "version";
$this->version->aliasFieldName = "text_version_text_version";
$this->version->label = "Version";
$this->version->allowNullValue = true;

$this->textId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->textId->tableName = "text_version_text";
$this->textId->fieldName = "text";
$this->textId->aliasFieldName = "text_version_text_text";
$this->textId->label = "Text";
$this->textId->allowNullValue = true;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "text_version_text";
$this->dateTime->externalTableName = "text_version_text";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "text_version_text_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = true;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "text_version_text";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "text_version_text_user";
$this->userId->label = "User";
$this->userId->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "text";
$index->addType($this->textId);

}
public function loadText() {
if ($this->text == null) {
$this->text = new \Nemundo\Content\App\Text\Data\Text\TextExternalType($this, "text_version_text_text");
$this->text->tableName = "text_version_text";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "text_version_text_text";
$this->text->label = "Text";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "text_version_text_user");
$this->user->tableName = "text_version_text";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "text_version_text_user";
$this->user->label = "User";
}
return $this;
}
}