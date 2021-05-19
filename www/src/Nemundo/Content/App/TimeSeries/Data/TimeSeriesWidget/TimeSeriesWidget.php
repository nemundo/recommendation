<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesWidget;
class TimeSeriesWidget extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TimeSeriesWidgetModel
*/
protected $model;

/**
* @var string
*/
public $timeSeriesId;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesWidgetModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->timeSeriesId, $this->timeSeriesId);
$id = parent::save();
return $id;
}
}