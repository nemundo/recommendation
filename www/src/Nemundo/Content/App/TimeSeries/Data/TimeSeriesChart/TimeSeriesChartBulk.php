<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart;
class TimeSeriesChartBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var TimeSeriesChartModel
*/
protected $model;

/**
* @var string
*/
public $timeSeriesId;

/**
* @var string
*/
public $lineId;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $dateFrom;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $dateTo;

/**
* @var string
*/
public $periodTypeId;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesChartModel();
$this->dateFrom = new \Nemundo\Core\Type\DateTime\Date();
$this->dateTo = new \Nemundo\Core\Type\DateTime\Date();
}
public function save() {
$this->typeValueList->setModelValue($this->model->timeSeriesId, $this->timeSeriesId);
$this->typeValueList->setModelValue($this->model->lineId, $this->lineId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->dateFrom, $this->typeValueList);
$property->setValue($this->dateFrom);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->dateTo, $this->typeValueList);
$property->setValue($this->dateTo);
$this->typeValueList->setModelValue($this->model->periodTypeId, $this->periodTypeId);
$id = parent::save();
return $id;
}
}