<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroupModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $usergroupId;

/**
* @var \Nemundo\User\Data\Usergroup\UsergroupExternalType
*/
public $usergroup;

protected function loadModel() {
$this->tableName = "user_user_usergroup";
$this->aliasTableName = "user_user_usergroup";
$this->label = "User Usergroup";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "user_user_usergroup";
$this->id->externalTableName = "user_user_usergroup";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "user_user_usergroup_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "user_user_usergroup";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "user_user_usergroup_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->usergroupId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->usergroupId->tableName = "user_user_usergroup";
$this->usergroupId->fieldName = "usergroup";
$this->usergroupId->aliasFieldName = "user_user_usergroup_usergroup";
$this->usergroupId->label = "Usergroup";
$this->usergroupId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "user_usergroup";
$index->addType($this->userId);
$index->addType($this->usergroupId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "user_user_usergroup_user");
$this->user->tableName = "user_user_usergroup";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "user_user_usergroup_user";
$this->user->label = "User";
}
return $this;
}
public function loadUsergroup() {
if ($this->usergroup == null) {
$this->usergroup = new \Nemundo\User\Data\Usergroup\UsergroupExternalType($this, "user_user_usergroup_usergroup");
$this->usergroup->tableName = "user_user_usergroup";
$this->usergroup->fieldName = "usergroup";
$this->usergroup->aliasFieldName = "user_user_usergroup_usergroup";
$this->usergroup->label = "Usergroup";
}
return $this;
}
}