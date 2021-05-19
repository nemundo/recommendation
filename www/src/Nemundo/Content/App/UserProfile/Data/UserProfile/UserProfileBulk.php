<?php
namespace Nemundo\Content\App\UserProfile\Data\UserProfile;
class UserProfileBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var UserProfileModel
*/
protected $model;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $lastName;

/**
* @var string
*/
public $firstName;

public function __construct() {
parent::__construct();
$this->model = new UserProfileModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->lastName, $this->lastName);
$this->typeValueList->setModelValue($this->model->firstName, $this->firstName);
$id = parent::save();
return $id;
}
}