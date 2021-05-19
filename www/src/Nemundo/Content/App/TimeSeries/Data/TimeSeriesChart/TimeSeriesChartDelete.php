<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart;
class TimeSeriesChartDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TimeSeriesChartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesChartModel();
}
}