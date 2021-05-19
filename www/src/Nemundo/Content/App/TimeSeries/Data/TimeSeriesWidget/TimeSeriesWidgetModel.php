<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesWidget;
class TimeSeriesWidgetModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "timeseries_time_series_widget";
$this->aliasTableName = "timeseries_time_series_widget";
$this->label = "Time Series Widget";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "timeseries_time_series_widget";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "timeseries_time_series_widget_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->timeSeriesId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->timeSeriesId->tableName = "timeseries_time_series_widget";
$this->timeSeriesId->fieldName = "time_series";
$this->timeSeriesId->aliasFieldName = "timeseries_time_series_widget_time_series";
$this->timeSeriesId->label = "Time Series";
$this->timeSeriesId->allowNullValue = true;

}
public function loadTimeSeries() {
if ($this->timeSeries == null) {
$this->timeSeries = new \Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesExternalType($this, "timeseries_time_series_widget_time_series");
$this->timeSeries->tableName = "timeseries_time_series_widget";
$this->timeSeries->fieldName = "time_series";
$this->timeSeries->aliasFieldName = "timeseries_time_series_widget_time_series";
$this->timeSeries->label = "Time Series";
}
return $this;
}
}