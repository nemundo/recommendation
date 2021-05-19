<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroupValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserUsergroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserUsergroupModel();
}
}