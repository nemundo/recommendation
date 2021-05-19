<?php
namespace Nemundo\Content\App\UserProfile\Data\UserProfile;
class UserProfileExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Text\TextType
*/
public $lastName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $firstName;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = UserProfileModel::class;
$this->externalTableName = "userprofile_user_profile";
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

$this->lastName = new \Nemundo\Model\Type\Text\TextType();
$this->lastName->fieldName = "last_name";
$this->lastName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->lastName->externalTableName = $this->externalTableName;
$this->lastName->aliasFieldName = $this->lastName->tableName . "_" . $this->lastName->fieldName;
$this->lastName->label = "Last Name";
$this->addType($this->lastName);

$this->firstName = new \Nemundo\Model\Type\Text\TextType();
$this->firstName->fieldName = "first_name";
$this->firstName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->firstName->externalTableName = $this->externalTableName;
$this->firstName->aliasFieldName = $this->firstName->tableName . "_" . $this->firstName->fieldName;
$this->firstName->label = "First Name";
$this->addType($this->firstName);

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