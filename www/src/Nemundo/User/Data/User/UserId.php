<?php
namespace Nemundo\User\Data\User;
use Nemundo\Model\Id\AbstractModelIdValue;
class UserId extends AbstractModelIdValue {
/**
* @var UserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserModel();
}
}