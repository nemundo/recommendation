<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesData;
use Nemundo\Model\Data\AbstractModelUpdate;
class TimeSeriesDataUpdate extends AbstractModelUpdate {
/**
* @var TimeSeriesDataModel
*/
public $model;

/**
* @var string
*/
public $periodId;

/**
* @var int
*/
public $value;

/**
* @var string
*/
public $lineId;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesDataModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->periodId, $this->periodId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
$this->typeValueList->setModelValue($this->model->lineId, $this->lineId);
parent::update();
}
}