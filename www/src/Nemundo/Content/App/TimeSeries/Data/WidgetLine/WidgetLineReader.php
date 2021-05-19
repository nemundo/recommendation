<?php
namespace Nemundo\Content\App\TimeSeries\Data\WidgetLine;
class WidgetLineReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WidgetLineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetLineModel();
}
/**
* @return WidgetLineRow[]
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
* @return WidgetLineRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WidgetLineRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WidgetLineRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}