<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesWidget;
class TimeSeriesWidgetValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TimeSeriesWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesWidgetModel();
}
}