<?php
namespace Nemundo\Content\App\UserProfile\Data\UserProfile;
class UserProfileCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UserProfileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserProfileModel();
}
}