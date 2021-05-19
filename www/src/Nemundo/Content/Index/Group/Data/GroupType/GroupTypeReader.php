<?php
namespace Nemundo\Content\Index\Group\Data\GroupType;
class GroupTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var GroupTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GroupTypeModel();
}
/**
* @return GroupTypeRow[]
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
* @return GroupTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return GroupTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new GroupTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}