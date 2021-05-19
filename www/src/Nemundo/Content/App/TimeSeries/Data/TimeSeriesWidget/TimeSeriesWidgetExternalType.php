<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesWidget;
class TimeSeriesWidgetExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TimeSeriesWidgetModel::class;
$this->externalTableName = "timeseries_time_series_widget";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->timeSeriesId = new \Nemundo\Model\Type\Id\IdType();
$this->timeSeriesId->fieldName = "time_series";
$this->timeSeriesId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->timeSeriesId->aliasFieldName = $this->timeSeriesId->tableName ."_".$this->timeSeriesId->fieldName;
$this->timeSeriesId->label = "Time Series";
$this->addType($this->timeSeriesId);

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
}