<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroupCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UserUsergroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserUsergroupModel();
}
}