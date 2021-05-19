<?php
namespace Hackathon\Data\Master;
class MasterReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MasterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MasterModel();
}
/**
* @return MasterRow[]
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
* @return MasterRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MasterRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MasterRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}