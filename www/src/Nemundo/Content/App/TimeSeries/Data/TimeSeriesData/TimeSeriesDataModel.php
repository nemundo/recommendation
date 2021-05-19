<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesData;
class TimeSeriesDataModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $periodId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\Period\PeriodExternalType
*/
public $period;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $value;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $lineId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\Line\LineExternalType
*/
public $line;

protected function loadModel() {
$this->tableName = "timeseries_timeseries_data";
$this->aliasTableName = "timeseries_timeseries_data";
$this->label = "Time Series Data";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "timeseries_timeseries_data";
$this->id->externalTableName = "timeseries_timeseries_data";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "timeseries_timeseries_data_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->periodId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->periodId->tableName = "timeseries_timeseries_data";
$this->periodId->fieldName = "period";
$this->periodId->aliasFieldName = "timeseries_timeseries_data_period";
$this->periodId->label = "Period";
$this->periodId->allowNullValue = true;

$this->value = new \Nemundo\Model\Type\Number\NumberType($this);
$this->value->tableName = "timeseries_timeseries_data";
$this->value->externalTableName = "timeseries_timeseries_data";
$this->value->fieldName = "value";
$this->value->aliasFieldName = "timeseries_timeseries_data_value";
$this->value->label = "Value";
$this->value->allowNullValue = true;

$this->lineId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->lineId->tableName = "timeseries_timeseries_data";
$this->lineId->fieldName = "line";
$this->lineId->aliasFieldName = "timeseries_timeseries_data_line";
$this->lineId->label = "Line";
$this->lineId->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "time_series_period";
$index->addType($this->lineId);
$index->addType($this->periodId);

}
public function loadPeriod() {
if ($this->period == null) {
$this->period = new \Nemundo\Content\App\TimeSeries\Data\Period\PeriodExternalType($this, "timeseries_timeseries_data_period");
$this->period->tableName = "timeseries_timeseries_data";
$this->period->fieldName = "period";
$this->period->aliasFieldName = "timeseries_timeseries_data_period";
$this->period->label = "Period";
}
return $this;
}
public function loadLine() {
if ($this->line == null) {
$this->line = new \Nemundo\Content\App\TimeSeries\Data\Line\LineExternalType($this, "timeseries_timeseries_data_line");
$this->line->tableName = "timeseries_timeseries_data";
$this->line->fieldName = "line";
$this->line->aliasFieldName = "timeseries_timeseries_data_line";
$this->line->label = "Line";
}
return $this;
}
}