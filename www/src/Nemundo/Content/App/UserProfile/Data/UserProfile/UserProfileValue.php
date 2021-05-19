<?php
namespace Nemundo\Content\App\UserProfile\Data\UserProfile;
class UserProfileValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserProfileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserProfileModel();
}
}