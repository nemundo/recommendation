<?php
namespace Nemundo\Srf\Data\Show;
class ShowReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ShowModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ShowModel();
}
/**
* @return ShowRow[]
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
* @return ShowRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ShowRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ShowRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}