<?php
namespace Nemundo\Content\App\UserProfile\Data\UserProfile;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserProfileUpdate extends AbstractModelUpdate {
/**
* @var UserProfileModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->lastName, $this->lastName);
$this->typeValueList->setModelValue($this->model->firstName, $this->firstName);
parent::update();
}
}