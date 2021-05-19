<?php
namespace Nemundo\Content\App\TimeSeries\Data\Period;
class PeriodRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PeriodModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $year;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $date;

/**
* @var int
*/
public $week;

/**
* @var int
*/
public $periodTypeId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeRow
*/
public $periodType;

/**
* @var int
*/
public $weekYear;

/**
* @var int
*/
public $month;

/**
* @var int
*/
public $monthYear;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->year = intval($this->getModelValue($model->year));
$value = $this->getModelValue($model->date);
if ($value !== "0000-00-00") {
$this->date = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->date));
}
$this->week = intval($this->getModelValue($model->week));
$this->periodTypeId = intval($this->getModelValue($model->periodTypeId));
if ($model->periodType !== null) {
$this->loadNemundoContentAppTimeSeriesDataPeriodTypePeriodTypeperiodTypeRow($model->periodType);
}
$this->weekYear = intval($this->getModelValue($model->weekYear));
$this->month = intval($this->getModelValue($model->month));
$this->monthYear = intval($this->getModelValue($model->monthYear));
}
private function loadNemundoContentAppTimeSeriesDataPeriodTypePeriodTypeperiodTypeRow($model) {
$this->periodType = new \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeRow($this->row, $model);
}
}