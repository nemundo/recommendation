<?php
namespace Nemundo\Content\Index\Group\Data\GroupUser;
class GroupUserReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var GroupUserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GroupUserModel();
}
/**
* @return GroupUserRow[]
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
* @return GroupUserRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return GroupUserRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new GroupUserRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}