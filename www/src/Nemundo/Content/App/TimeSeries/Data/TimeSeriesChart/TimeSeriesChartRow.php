<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart;
class TimeSeriesChartRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TimeSeriesChartModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $timeSeriesId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesRow
*/
public $timeSeries;

/**
* @var int
*/
public $lineId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\Line\LineRow
*/
public $line;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $dateFrom;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $dateTo;

/**
* @var int
*/
public $periodTypeId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeRow
*/
public $periodType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->timeSeriesId = intval($this->getModelValue($model->timeSeriesId));
if ($model->timeSeries !== null) {
$this->loadNemundoContentAppTimeSeriesDataTimeSeriesTimeSeriestimeSeriesRow($model->timeSeries);
}
$this->lineId = intval($this->getModelValue($model->lineId));
if ($model->line !== null) {
$this->loadNemundoContentAppTimeSeriesDataLineLinelineRow($model->line);
}
$value = $this->getModelValue($model->dateFrom);
if ($value !== "0000-00-00") {
$this->dateFrom = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->dateFrom));
}
$value = $this->getModelValue($model->dateTo);
if ($value !== "0000-00-00") {
$this->dateTo = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->dateTo));
}
$this->periodTypeId = intval($this->getModelValue($model->periodTypeId));
if ($model->periodType !== null) {
$this->loadNemundoContentAppTimeSeriesDataPeriodTypePeriodTypeperiodTypeRow($model->periodType);
}
}
private function loadNemundoContentAppTimeSeriesDataTimeSeriesTimeSeriestimeSeriesRow($model) {
$this->timeSeries = new \Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesRow($this->row, $model);
}
private function loadNemundoContentAppTimeSeriesDataLineLinelineRow($model) {
$this->line = new \Nemundo\Content\App\TimeSeries\Data\Line\LineRow($this->row, $model);
}
private function loadNemundoContentAppTimeSeriesDataPeriodTypePeriodTypeperiodTypeRow($model) {
$this->periodType = new \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeRow($this->row, $model);
}
}