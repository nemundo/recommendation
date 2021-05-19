<?php
namespace Nemundo\User\Data\UserUsergroup;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserUsergroupUpdate extends AbstractModelUpdate {
/**
* @var UserUsergroupModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->usergroupId, $this->usergroupId);
parent::update();
}
}