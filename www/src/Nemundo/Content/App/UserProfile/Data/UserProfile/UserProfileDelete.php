<?php
namespace Nemundo\Content\App\UserProfile\Data\UserProfile;
class UserProfileDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UserProfileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserProfileModel();
}
}