<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart;
class TimeSeriesChartCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TimeSeriesChartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesChartModel();
}
}