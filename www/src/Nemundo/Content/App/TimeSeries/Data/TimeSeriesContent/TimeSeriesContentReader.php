<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesContent;
class TimeSeriesContentReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TimeSeriesContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesContentModel();
}
/**
* @return TimeSeriesContentRow[]
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
* @return TimeSeriesContentRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TimeSeriesContentRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TimeSeriesContentRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}