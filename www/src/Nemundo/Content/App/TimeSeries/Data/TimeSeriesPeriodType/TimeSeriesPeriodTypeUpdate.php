<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType;
use Nemundo\Model\Data\AbstractModelUpdate;
class TimeSeriesPeriodTypeUpdate extends AbstractModelUpdate {
/**
* @var TimeSeriesPeriodTypeModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->timeSeriesId, $this->timeSeriesId);
$this->typeValueList->setModelValue($this->model->periodTypeId, $this->periodTypeId);
parent::update();
}
}