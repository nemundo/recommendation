<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesWidget;
class TimeSeriesWidgetDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TimeSeriesWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesWidgetModel();
}
}