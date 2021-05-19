<?php
namespace Nemundo\Content\App\TimeSeries\Data\Unit;
class UnitReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UnitModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UnitModel();
}
/**
* @return UnitRow[]
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
* @return UnitRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UnitRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UnitRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}