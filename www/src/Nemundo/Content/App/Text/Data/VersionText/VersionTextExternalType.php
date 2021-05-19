<?php
namespace Nemundo\Content\App\Text\Data\VersionText;
class VersionTextExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = VersionTextModel::class;
$this->externalTableName = "text_version_text";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->versionText = new \Nemundo\Model\Type\Text\TextType();
$this->versionText->fieldName = "version_text";
$this->versionText->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->versionText->externalTableName = $this->externalTableName;
$this->versionText->aliasFieldName = $this->versionText->tableName . "_" . $this->versionText->fieldName;
$this->versionText->label = "Version Text";
$this->addType($this->versionText);

$this->version = new \Nemundo\Model\Type\Number\NumberType();
$this->version->fieldName = "version";
$this->version->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->version->externalTableName = $this->externalTableName;
$this->version->aliasFieldName = $this->version->tableName . "_" . $this->version->fieldName;
$this->version->label = "Version";
$this->addType($this->version);

$this->textId = new \Nemundo\Model\Type\Id\IdType();
$this->textId->fieldName = "text";
$this->textId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->textId->aliasFieldName = $this->textId->tableName ."_".$this->textId->fieldName;
$this->textId->label = "Text";
$this->addType($this->textId);

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

}
public function loadText() {
if ($this->text == null) {
$this->text = new \Nemundo\Content\App\Text\Data\Text\TextExternalType(null, $this->parentFieldName . "_text");
$this->text->fieldName = "text";
$this->text->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->text->aliasFieldName = $this->text->tableName ."_".$this->text->fieldName;
$this->text->label = "Text";
$this->addType($this->text);
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
}