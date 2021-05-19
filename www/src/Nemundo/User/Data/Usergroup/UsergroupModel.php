<?php
namespace Nemundo\User\Data\Usergroup;
class UsergroupModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $usergroup;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

protected function loadModel() {
$this->tableName = "user_usergroup";
$this->aliasTableName = "user_usergroup";
$this->label = "Usergroup";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "user_usergroup";
$this->id->externalTableName = "user_usergroup";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "user_usergroup_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->usergroup = new \Nemundo\Model\Type\Text\TextType($this);
$this->usergroup->tableName = "user_usergroup";
$this->usergroup->externalTableName = "user_usergroup";
$this->usergroup->fieldName = "usergroup";
$this->usergroup->aliasFieldName = "user_usergroup_usergroup";
$this->usergroup->label = "Usergroup";
$this->usergroup->allowNullValue = false;
$this->usergroup->length = 255;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "user_usergroup";
$this->setupStatus->externalTableName = "user_usergroup";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "user_usergroup_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = false;

}
}