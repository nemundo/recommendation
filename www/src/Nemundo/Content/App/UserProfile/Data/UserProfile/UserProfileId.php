<?php
namespace Nemundo\Content\App\UserProfile\Data\UserProfile;
use Nemundo\Model\Id\AbstractModelIdValue;
class UserProfileId extends AbstractModelIdValue {
/**
* @var UserProfileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserProfileModel();
}
}