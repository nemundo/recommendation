<?php
namespace Nemundo\Content\Index\Geo\Data\Distance;
class DistanceReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var DistanceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DistanceModel();
}
/**
* @return DistanceRow[]
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
* @return DistanceRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return DistanceRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new DistanceRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}