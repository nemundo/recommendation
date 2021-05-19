<?php
namespace Nemundo\Content\App\Dashboard\Data\DashboardColumn;
class DashboardColumnReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var DashboardColumnModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DashboardColumnModel();
}
/**
* @return DashboardColumnRow[]
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
* @return DashboardColumnRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return DashboardColumnRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new DashboardColumnRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}