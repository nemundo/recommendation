<?php
namespace Nemundo\Content\Index\Group\Data\GroupUser;
class GroupUserModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $groupId;

/**
* @var \Nemundo\Content\Index\Group\Data\Group\GroupExternalType
*/
public $group;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadModel() {
$this->tableName = "content_group_user";
$this->aliasTableName = "content_group_user";
$this->label = "Group User";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_group_user";
$this->id->externalTableName = "content_group_user";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_group_user_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->groupId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->groupId->tableName = "content_group_user";
$this->groupId->fieldName = "group";
$this->groupId->aliasFieldName = "content_group_user_group";
$this->groupId->label = "Group";
$this->groupId->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "content_group_user";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "content_group_user_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "group_user";
$index->addType($this->groupId);
$index->addType($this->userId);

}
public function loadGroup() {
if ($this->group == null) {
$this->group = new \Nemundo\Content\Index\Group\Data\Group\GroupExternalType($this, "content_group_user_group");
$this->group->tableName = "content_group_user";
$this->group->fieldName = "group";
$this->group->aliasFieldName = "content_group_user_group";
$this->group->label = "Group";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "content_group_user_user");
$this->user->tableName = "content_group_user";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "content_group_user_user";
$this->user->label = "User";
}
return $this;
}
}