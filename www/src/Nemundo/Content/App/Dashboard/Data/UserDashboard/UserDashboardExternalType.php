<?php
namespace Nemundo\Content\App\Dashboard\Data\UserDashboard;
class UserDashboardExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = UserDashboardModel::class;
$this->externalTableName = "dashboard_user_dashboard";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->dashboard = new \Nemundo\Model\Type\Text\TextType();
$this->dashboard->fieldName = "dashboard";
$this->dashboard->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dashboard->externalTableName = $this->externalTableName;
$this->dashboard->aliasFieldName = $this->dashboard->tableName . "_" . $this->dashboard->fieldName;
$this->dashboard->label = "Dashboard";
$this->addType($this->dashboard);

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