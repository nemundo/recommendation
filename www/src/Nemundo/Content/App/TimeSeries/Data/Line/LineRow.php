<?php
namespace Nemundo\Content\App\TimeSeries\Data\Line;
class LineRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LineModel
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
* @var string
*/
public $line;

/**
* @var string
*/
public $uniqueName;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->timeSeriesId = intval($this->getModelValue($model->timeSeriesId));
if ($model->timeSeries !== null) {
$this->loadNemundoContentAppTimeSeriesDataTimeSeriesTimeSeriestimeSeriesRow($model->timeSeries);
}
$this->line = $this->getModelValue($model->line);
$this->uniqueName = $this->getModelValue($model->uniqueName);
}
private function loadNemundoContentAppTimeSeriesDataTimeSeriesTimeSeriestimeSeriesRow($model) {
$this->timeSeries = new \Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesRow($this->row, $model);
}
}