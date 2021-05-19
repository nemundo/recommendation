<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart;
class TimeSeriesChartExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $timeSeriesId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesExternalType
*/
public $timeSeries;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $lineId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\Line\LineExternalType
*/
public $line;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $dateFrom;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $dateTo;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $periodTypeId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeExternalType
*/
public $periodType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TimeSeriesChartModel::class;
$this->externalTableName = "timeseries_time_series_chart";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->timeSeriesId = new \Nemundo\Model\Type\Id\IdType();
$this->timeSeriesId->fieldName = "time_series";
$this->timeSeriesId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->timeSeriesId->aliasFieldName = $this->timeSeriesId->tableName ."_".$this->timeSeriesId->fieldName;
$this->timeSeriesId->label = "Time Series";
$this->addType($this->timeSeriesId);

$this->lineId = new \Nemundo\Model\Type\Id\IdType();
$this->lineId->fieldName = "line";
$this->lineId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->lineId->aliasFieldName = $this->lineId->tableName ."_".$this->lineId->fieldName;
$this->lineId->label = "Line";
$this->addType($this->lineId);

$this->dateFrom = new \Nemundo\Model\Type\DateTime\DateType();
$this->dateFrom->fieldName = "date_from";
$this->dateFrom->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateFrom->externalTableName = $this->externalTableName;
$this->dateFrom->aliasFieldName = $this->dateFrom->tableName . "_" . $this->dateFrom->fieldName;
$this->dateFrom->label = "Date From";
$this->addType($this->dateFrom);

$this->dateTo = new \Nemundo\Model\Type\DateTime\DateType();
$this->dateTo->fieldName = "date_to";
$this->dateTo->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTo->externalTableName = $this->externalTableName;
$this->dateTo->aliasFieldName = $this->dateTo->tableName . "_" . $this->dateTo->fieldName;
$this->dateTo->label = "Date To";
$this->addType($this->dateTo);

$this->periodTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->periodTypeId->fieldName = "period_type";
$this->periodTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->periodTypeId->aliasFieldName = $this->periodTypeId->tableName ."_".$this->periodTypeId->fieldName;
$this->periodTypeId->label = "Period Type";
$this->addType($this->periodTypeId);

}
public function loadTimeSeries() {
if ($this->timeSeries == null) {
$this->timeSeries = new \Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesExternalType(null, $this->parentFieldName . "_time_series");
$this->timeSeries->fieldName = "time_series";
$this->timeSeries->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->timeSeries->aliasFieldName = $this->timeSeries->tableName ."_".$this->timeSeries->fieldName;
$this->timeSeries->label = "Time Series";
$this->addType($this->timeSeries);
}
return $this;
}
public function loadLine() {
if ($this->line == null) {
$this->line = new \Nemundo\Content\App\TimeSeries\Data\Line\LineExternalType(null, $this->parentFieldName . "_line");
$this->line->fieldName = "line";
$this->line->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->line->aliasFieldName = $this->line->tableName ."_".$this->line->fieldName;
$this->line->label = "Line";
$this->addType($this->line);
}
return $this;
}
public function loadPeriodType() {
if ($this->periodType == null) {
$this->periodType = new \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeExternalType(null, $this->parentFieldName . "_period_type");
$this->periodType->fieldName = "period_type";
$this->periodType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->periodType->aliasFieldName = $this->periodType->tableName ."_".$this->periodType->fieldName;
$this->periodType->label = "Period Type";
$this->addType($this->periodType);
}
return $this;
}
}