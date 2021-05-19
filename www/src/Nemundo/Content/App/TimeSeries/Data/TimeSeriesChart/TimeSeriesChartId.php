<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart;
use Nemundo\Model\Id\AbstractModelIdValue;
class TimeSeriesChartId extends AbstractModelIdValue {
/**
* @var TimeSeriesChartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesChartModel();
}
}