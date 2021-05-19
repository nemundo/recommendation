<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesWidget;
class TimeSeriesWidgetPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TimeSeriesWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesWidgetModel();
}
/**
* @return TimeSeriesWidgetRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TimeSeriesWidgetRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}