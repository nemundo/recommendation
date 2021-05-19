<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroupDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UserUsergroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserUsergroupModel();
}
}