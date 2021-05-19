<?php
namespace Nemundo\User\Data\Usergroup;
class UsergroupReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UsergroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UsergroupModel();
}
/**
* @return UsergroupRow[]
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
* @return UsergroupRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UsergroupRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UsergroupRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}