<?php
namespace Nemundo\User\Data\User;
class UserDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserModel();
}
}