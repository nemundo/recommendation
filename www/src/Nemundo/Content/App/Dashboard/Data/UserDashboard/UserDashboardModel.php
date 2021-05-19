<?php
namespace Nemundo\Content\App\Dashboard\Data\UserDashboard;
class UserDashboardModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $dashboard;

protected function loadModel() {
$this->tableName = "dashboard_user_dashboard";
$this->aliasTableName = "dashboard_user_dashboard";
$this->label = "User Dashboard";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "dashboard_user_dashboard";
$this->id->externalTableName = "dashboard_user_dashboard";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "dashboard_user_dashboard_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "dashboard_user_dashboard";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "dashboard_user_dashboard_user";
$this->userId->label = "User";
$this->userId->allowNullValue = true;

$this->dashboard = new \Nemundo\Model\Type\Text\TextType($this);
$this->dashboard->tableName = "dashboard_user_dashboard";
$this->dashboard->externalTableName = "dashboard_user_dashboard";
$this->dashboard->fieldName = "dashboard";
$this->dashboard->aliasFieldName = "dashboard_user_dashboard_dashboard";
$this->dashboard->label = "Dashboard";
$this->dashboard->allowNullValue = true;
$this->dashboard->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "user";
$index->addType($this->userId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "dashboard_user_dashboard_user");
$this->user->tableName = "dashboard_user_dashboard";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "dashboard_user_dashboard_user";
$this->user->label = "User";
}
return $this;
}
}