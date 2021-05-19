<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart;
class TimeSeriesChartPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TimeSeriesChartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesChartModel();
}
/**
* @return TimeSeriesChartRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TimeSeriesChartRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}