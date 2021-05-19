<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart;
class TimeSeriesChartModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $timeSeriesId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesExternalType
*/
public $timeSeries;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $periodTypeId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeExternalType
*/
public $periodType;

protected function loadModel() {
$this->tableName = "timeseries_time_series_chart";
$this->aliasTableName = "timeseries_time_series_chart";
$this->label = "Time Series Chart";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "timeseries_time_series_chart";
$this->id->externalTableName = "timeseries_time_series_chart";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "timeseries_time_series_chart_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->timeSeriesId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->timeSeriesId->tableName = "timeseries_time_series_chart";
$this->timeSeriesId->fieldName = "time_series";
$this->timeSeriesId->aliasFieldName = "timeseries_time_series_chart_time_series";
$this->timeSeriesId->label = "Time Series";
$this->timeSeriesId->allowNullValue = true;

$this->lineId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->lineId->tableName = "timeseries_time_series_chart";
$this->lineId->fieldName = "line";
$this->lineId->aliasFieldName = "timeseries_time_series_chart_line";
$this->lineId->label = "Line";
$this->lineId->allowNullValue = true;

$this->dateFrom = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->dateFrom->tableName = "timeseries_time_series_chart";
$this->dateFrom->externalTableName = "timeseries_time_series_chart";
$this->dateFrom->fieldName = "date_from";
$this->dateFrom->aliasFieldName = "timeseries_time_series_chart_date_from";
$this->dateFrom->label = "Date From";
$this->dateFrom->allowNullValue = true;

$this->dateTo = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->dateTo->tableName = "timeseries_time_series_chart";
$this->dateTo->externalTableName = "timeseries_time_series_chart";
$this->dateTo->fieldName = "date_to";
$this->dateTo->aliasFieldName = "timeseries_time_series_chart_date_to";
$this->dateTo->label = "Date To";
$this->dateTo->allowNullValue = true;

$this->periodTypeId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->periodTypeId->tableName = "timeseries_time_series_chart";
$this->periodTypeId->fieldName = "period_type";
$this->periodTypeId->aliasFieldName = "timeseries_time_series_chart_period_type";
$this->periodTypeId->label = "Period Type";
$this->periodTypeId->allowNullValue = true;

}
public function loadTimeSeries() {
if ($this->timeSeries == null) {
$this->timeSeries = new \Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesExternalType($this, "timeseries_time_series_chart_time_series");
$this->timeSeries->tableName = "timeseries_time_series_chart";
$this->timeSeries->fieldName = "time_series";
$this->timeSeries->aliasFieldName = "timeseries_time_series_chart_time_series";
$this->timeSeries->label = "Time Series";
}
return $this;
}
public function loadLine() {
if ($this->line == null) {
$this->line = new \Nemundo\Content\App\TimeSeries\Data\Line\LineExternalType($this, "timeseries_time_series_chart_line");
$this->line->tableName = "timeseries_time_series_chart";
$this->line->fieldName = "line";
$this->line->aliasFieldName = "timeseries_time_series_chart_line";
$this->line->label = "Line";
}
return $this;
}
public function loadPeriodType() {
if ($this->periodType == null) {
$this->periodType = new \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeExternalType($this, "timeseries_time_series_chart_period_type");
$this->periodType->tableName = "timeseries_time_series_chart";
$this->periodType->fieldName = "period_type";
$this->periodType->aliasFieldName = "timeseries_time_series_chart_period_type";
$this->periodType->label = "Period Type";
}
return $this;
}
}