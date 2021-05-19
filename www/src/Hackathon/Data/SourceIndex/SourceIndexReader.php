<?php
namespace Hackathon\Data\SourceIndex;
class SourceIndexReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SourceIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceIndexModel();
}
/**
* @return SourceIndexRow[]
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
* @return SourceIndexRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SourceIndexRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SourceIndexRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}