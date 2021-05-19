<?php
namespace Nemundo\User\Data\User;
class UserValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserModel();
}
}