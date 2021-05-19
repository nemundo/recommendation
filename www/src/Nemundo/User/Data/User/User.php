<?php
namespace Nemundo\User\Data\User;
class User extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var UserModel
*/
protected $model;

/**
* @var bool
*/
public $active;

/**
* @var string
*/
public $login;

/**
* @var string
*/
public $password;

/**
* @var string
*/
public $email;

/**
* @var string
*/
public $displayName;

/**
* @var string
*/
public $secureToken;

public function __construct() {
parent::__construct();
$this->model = new UserModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->login, $this->login);
$this->typeValueList->setModelValue($this->model->password, $this->password);
$this->typeValueList->setModelValue($this->model->email, $this->email);
$this->typeValueList->setModelValue($this->model->displayName, $this->displayName);
$this->typeValueList->setModelValue($this->model->secureToken, $this->secureToken);
$id = parent::save();
return $id;
}
}