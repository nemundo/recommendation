<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesData;
class TimeSeriesDataReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TimeSeriesDataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesDataModel();
}
/**
* @return TimeSeriesDataRow[]
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
* @return TimeSeriesDataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TimeSeriesDataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TimeSeriesDataRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}