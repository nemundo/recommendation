<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroupRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var UserUsergroupModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

/**
* @var string
*/
public $usergroupId;

/**
* @var \Nemundo\User\Data\Usergroup\UsergroupRow
*/
public $usergroup;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->usergroupId = $this->getModelValue($model->usergroupId);
if ($model->usergroup !== null) {
$this->loadNemundoUserDataUsergroupUsergroupusergroupRow($model->usergroup);
}
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoUserDataUsergroupUsergroupusergroupRow($model) {
$this->usergroup = new \Nemundo\User\Data\Usergroup\UsergroupRow($this->row, $model);
}
}