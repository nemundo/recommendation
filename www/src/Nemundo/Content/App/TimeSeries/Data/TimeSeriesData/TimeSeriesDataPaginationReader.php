<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesData;
class TimeSeriesDataPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new TimeSeriesDataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}