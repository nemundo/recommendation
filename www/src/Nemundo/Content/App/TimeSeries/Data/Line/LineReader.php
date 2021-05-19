<?php
namespace Nemundo\Content\App\TimeSeries\Data\Line;
class LineReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LineModel();
}
/**
* @return LineRow[]
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
* @return LineRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return LineRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new LineRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}