<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType;
class TimeSeriesPeriodTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $periodTypeId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeExternalType
*/
public $periodType;

protected function loadModel() {
$this->tableName = "timeseries_time_series_period_type";
$this->aliasTableName = "timeseries_time_series_period_type";
$this->label = "Time Series Period Type";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "timeseries_time_series_period_type";
$this->id->externalTableName = "timeseries_time_series_period_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "timeseries_time_series_period_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->timeSeriesId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->timeSeriesId->tableName = "timeseries_time_series_period_type";
$this->timeSeriesId->fieldName = "time_series";
$this->timeSeriesId->aliasFieldName = "timeseries_time_series_period_type_time_series";
$this->timeSeriesId->label = "Time Series";
$this->timeSeriesId->allowNullValue = true;

$this->periodTypeId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->periodTypeId->tableName = "timeseries_time_series_period_type";
$this->periodTypeId->fieldName = "period_type";
$this->periodTypeId->aliasFieldName = "timeseries_time_series_period_type_period_type";
$this->periodTypeId->label = "Period Type";
$this->periodTypeId->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "time_series_period_type";
$index->addType($this->timeSeriesId);
$index->addType($this->periodTypeId);

}
public function loadTimeSeries() {
if ($this->timeSeries == null) {
$this->timeSeries = new \Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesExternalType($this, "timeseries_time_series_period_type_time_series");
$this->timeSeries->tableName = "timeseries_time_series_period_type";
$this->timeSeries->fieldName = "time_series";
$this->timeSeries->aliasFieldName = "timeseries_time_series_period_type_time_series";
$this->timeSeries->label = "Time Series";
}
return $this;
}
public function loadPeriodType() {
if ($this->periodType == null) {
$this->periodType = new \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeExternalType($this, "timeseries_time_series_period_type_period_type");
$this->periodType->tableName = "timeseries_time_series_period_type";
$this->periodType->fieldName = "period_type";
$this->periodType->aliasFieldName = "timeseries_time_series_period_type_period_type";
$this->periodType->label = "Period Type";
}
return $this;
}
}