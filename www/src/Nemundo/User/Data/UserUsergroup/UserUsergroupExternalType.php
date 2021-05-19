<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroupExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $usergroupId;

/**
* @var \Nemundo\User\Data\Usergroup\UsergroupExternalType
*/
public $usergroup;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = UserUsergroupModel::class;
$this->externalTableName = "user_user_usergroup";
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

$this->usergroupId = new \Nemundo\Model\Type\Id\IdType();
$this->usergroupId->fieldName = "usergroup";
$this->usergroupId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->usergroupId->aliasFieldName = $this->usergroupId->tableName ."_".$this->usergroupId->fieldName;
$this->usergroupId->label = "Usergroup";
$this->addType($this->usergroupId);

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
public function loadUsergroup() {
if ($this->usergroup == null) {
$this->usergroup = new \Nemundo\User\Data\Usergroup\UsergroupExternalType(null, $this->parentFieldName . "_usergroup");
$this->usergroup->fieldName = "usergroup";
$this->usergroup->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->usergroup->aliasFieldName = $this->usergroup->tableName ."_".$this->usergroup->fieldName;
$this->usergroup->label = "Usergroup";
$this->addType($this->usergroup);
}
return $this;
}
}