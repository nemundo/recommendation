<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesData;
class TimeSeriesDataRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TimeSeriesDataModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $periodId;

/**
* @var \Nemundo\Content\App\TimeSeries\Row\PeriodCustomRow
*/
public $period;

/**
* @var int
*/
public $value;

/**
* @var int
*/
public $lineId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\Line\LineRow
*/
public $line;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->periodId = intval($this->getModelValue($model->periodId));
if ($model->period !== null) {
$this->loadNemundoContentAppTimeSeriesDataPeriodPeriodperiodRow($model->period);
}
$this->value = intval($this->getModelValue($model->value));
$this->lineId = intval($this->getModelValue($model->lineId));
if ($model->line !== null) {
$this->loadNemundoContentAppTimeSeriesDataLineLinelineRow($model->line);
}
}
private function loadNemundoContentAppTimeSeriesDataPeriodPeriodperiodRow($model) {
$this->period = new \Nemundo\Content\App\TimeSeries\Row\PeriodCustomRow($this->row, $model);
}
private function loadNemundoContentAppTimeSeriesDataLineLinelineRow($model) {
$this->line = new \Nemundo\Content\App\TimeSeries\Data\Line\LineRow($this->row, $model);
}
}