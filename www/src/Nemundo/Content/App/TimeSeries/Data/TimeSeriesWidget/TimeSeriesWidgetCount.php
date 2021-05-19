<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesWidget;
class TimeSeriesWidgetCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TimeSeriesWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesWidgetModel();
}
}