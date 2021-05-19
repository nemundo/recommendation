<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType;
class TimeSeriesPeriodTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TimeSeriesPeriodTypeModel
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
$this->periodTypeId = intval($this->getModelValue($model->periodTypeId));
if ($model->periodType !== null) {
$this->loadNemundoContentAppTimeSeriesDataPeriodTypePeriodTypeperiodTypeRow($model->periodType);
}
}
private function loadNemundoContentAppTimeSeriesDataTimeSeriesTimeSeriestimeSeriesRow($model) {
$this->timeSeries = new \Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesRow($this->row, $model);
}
private function loadNemundoContentAppTimeSeriesDataPeriodTypePeriodTypeperiodTypeRow($model) {
$this->periodType = new \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeRow($this->row, $model);
}
}