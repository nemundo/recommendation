<?php
namespace Nemundo\User\Data\UserUsergroup;
use Nemundo\Model\Id\AbstractModelIdValue;
class UserUsergroupId extends AbstractModelIdValue {
/**
* @var UserUsergroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserUsergroupModel();
}
}