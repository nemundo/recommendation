<?php
namespace Hackathon\Data\Snb;
class SnbReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SnbModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SnbModel();
}
/**
* @return SnbRow[]
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
* @return SnbRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SnbRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SnbRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}