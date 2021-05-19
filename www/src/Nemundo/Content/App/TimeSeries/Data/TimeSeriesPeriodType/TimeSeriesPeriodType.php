<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType;
class TimeSeriesPeriodType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TimeSeriesPeriodTypeModel
*/
protected $model;

/**
* @var string
*/
public $timeSeriesId;

/**
* @var string
*/
public $periodTypeId;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesPeriodTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->timeSeriesId, $this->timeSeriesId);
$this->typeValueList->setModelValue($this->model->periodTypeId, $this->periodTypeId);
$id = parent::save();
return $id;
}
}