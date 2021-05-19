<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesWidget;
class TimeSeriesWidgetBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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