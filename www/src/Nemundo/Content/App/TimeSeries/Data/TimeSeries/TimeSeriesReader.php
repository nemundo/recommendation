<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeries;
class TimeSeriesReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TimeSeriesModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesModel();
}
/**
* @return TimeSeriesRow[]
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
* @return TimeSeriesRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TimeSeriesRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TimeSeriesRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}