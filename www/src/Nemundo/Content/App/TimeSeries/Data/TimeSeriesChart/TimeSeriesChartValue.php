<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart;
class TimeSeriesChartValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TimeSeriesChartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesChartModel();
}
}