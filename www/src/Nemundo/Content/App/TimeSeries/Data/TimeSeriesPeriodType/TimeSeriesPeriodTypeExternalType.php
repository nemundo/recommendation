<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType;
class TimeSeriesPeriodTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
public $periodTypeId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeExternalType
*/
public $periodType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TimeSeriesPeriodTypeModel::class;
$this->externalTableName = "timeseries_time_series_period_type";
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