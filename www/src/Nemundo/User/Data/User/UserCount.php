<?php
namespace Nemundo\User\Data\User;
class UserCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserModel();
}
}