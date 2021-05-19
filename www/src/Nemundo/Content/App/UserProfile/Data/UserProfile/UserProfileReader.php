<?php
namespace Nemundo\Content\App\UserProfile\Data\UserProfile;
class UserProfileReader extends \Nemundo\Model\Reader\ModelDataReader {
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
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return UserProfileRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UserProfileRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UserProfileRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}