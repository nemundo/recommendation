<?php
namespace Nemundo\Content\App\TimeSeries\Data\Line;
class LineModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\Text\TextType
*/
public $line;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $uniqueName;

protected function loadModel() {
$this->tableName = "timeseries_line";
$this->aliasTableName = "timeseries_line";
$this->label = "Line";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "timeseries_line";
$this->id->externalTableName = "timeseries_line";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "timeseries_line_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->timeSeriesId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->timeSeriesId->tableName = "timeseries_line";
$this->timeSeriesId->fieldName = "time_series";
$this->timeSeriesId->aliasFieldName = "timeseries_line_time_series";
$this->timeSeriesId->label = "Time Series";
$this->timeSeriesId->allowNullValue = true;

$this->line = new \Nemundo\Model\Type\Text\TextType($this);
$this->line->tableName = "timeseries_line";
$this->line->externalTableName = "timeseries_line";
$this->line->fieldName = "line";
$this->line->aliasFieldName = "timeseries_line_line";
$this->line->label = "Line";
$this->line->allowNullValue = true;
$this->line->length = 255;

$this->uniqueName = new \Nemundo\Model\Type\Text\TextType($this);
$this->uniqueName->tableName = "timeseries_line";
$this->uniqueName->externalTableName = "timeseries_line";
$this->uniqueName->fieldName = "unique_name";
$this->uniqueName->aliasFieldName = "timeseries_line_unique_name";
$this->uniqueName->label = "Unique Name";
$this->uniqueName->allowNullValue = true;
$this->uniqueName->length = 50;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "time_series_unique_name";
$index->addType($this->timeSeriesId);
$index->addType($this->uniqueName);

}
public function loadTimeSeries() {
if ($this->timeSeries == null) {
$this->timeSeries = new \Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesExternalType($this, "timeseries_line_time_series");
$this->timeSeries->tableName = "timeseries_line";
$this->timeSeries->fieldName = "time_series";
$this->timeSeries->aliasFieldName = "timeseries_line_time_series";
$this->timeSeries->label = "Time Series";
}
return $this;
}
}