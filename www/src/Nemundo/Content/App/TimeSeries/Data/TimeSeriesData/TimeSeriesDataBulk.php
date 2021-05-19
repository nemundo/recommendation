<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesData;
class TimeSeriesDataBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var TimeSeriesDataModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->periodId, $this->periodId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
$this->typeValueList->setModelValue($this->model->lineId, $this->lineId);
$id = parent::save();
return $id;
}
}