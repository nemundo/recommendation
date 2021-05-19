<?php
namespace Nemundo\Content\App\UserProfile\Data\UserProfile;
class UserProfileModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\Text\TextType
*/
public $lastName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $firstName;

protected function loadModel() {
$this->tableName = "userprofile_user_profile";
$this->aliasTableName = "userprofile_user_profile";
$this->label = "User Profile";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "userprofile_user_profile";
$this->id->externalTableName = "userprofile_user_profile";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "userprofile_user_profile_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "userprofile_user_profile";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "userprofile_user_profile_user";
$this->userId->label = "User";
$this->userId->allowNullValue = true;

$this->lastName = new \Nemundo\Model\Type\Text\TextType($this);
$this->lastName->tableName = "userprofile_user_profile";
$this->lastName->externalTableName = "userprofile_user_profile";
$this->lastName->fieldName = "last_name";
$this->lastName->aliasFieldName = "userprofile_user_profile_last_name";
$this->lastName->label = "Last Name";
$this->lastName->allowNullValue = true;
$this->lastName->length = 255;

$this->firstName = new \Nemundo\Model\Type\Text\TextType($this);
$this->firstName->tableName = "userprofile_user_profile";
$this->firstName->externalTableName = "userprofile_user_profile";
$this->firstName->fieldName = "first_name";
$this->firstName->aliasFieldName = "userprofile_user_profile_first_name";
$this->firstName->label = "First Name";
$this->firstName->allowNullValue = true;
$this->firstName->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "user";
$index->addType($this->userId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "userprofile_user_profile_user");
$this->user->tableName = "userprofile_user_profile";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "userprofile_user_profile_user";
$this->user->label = "User";
}
return $this;
}
}