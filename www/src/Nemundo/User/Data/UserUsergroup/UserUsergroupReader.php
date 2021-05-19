<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroupReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UserUsergroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserUsergroupModel();
}
/**
* @return UserUsergroupRow[]
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
* @return UserUsergroupRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UserUsergroupRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UserUsergroupRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}