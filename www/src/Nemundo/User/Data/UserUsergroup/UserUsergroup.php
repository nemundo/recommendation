<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroup extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var UserUsergroupModel
*/
protected $model;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $usergroupId;

public function __construct() {
parent::__construct();
$this->model = new UserUsergroupModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->usergroupId, $this->usergroupId);
$id = parent::save();
return $id;
}
}