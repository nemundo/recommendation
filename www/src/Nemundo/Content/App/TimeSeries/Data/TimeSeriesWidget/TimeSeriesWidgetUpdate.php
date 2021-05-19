<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesWidget;
use Nemundo\Model\Data\AbstractModelUpdate;
class TimeSeriesWidgetUpdate extends AbstractModelUpdate {
/**
* @var TimeSeriesWidgetModel
*/
public $model;

/**
* @var string
*/
public $timeSeriesId;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesWidgetModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->timeSeriesId, $this->timeSeriesId);
parent::update();
}
}