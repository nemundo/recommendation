<?php
namespace Nemundo\Content\App\UserProfile\Data\UserProfile;
class UserProfilePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var UserProfileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserProfileModel();
}
/**
* @return UserProfileRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UserProfileRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}