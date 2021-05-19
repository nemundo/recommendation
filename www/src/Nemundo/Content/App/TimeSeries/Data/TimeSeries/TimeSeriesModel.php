<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeries;
class TimeSeriesModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $timeSeries;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $uniqueName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $source;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $sourceUrl;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $lastUpdate;

protected function loadModel() {
$this->tableName = "timeseries_time_series";
$this->aliasTableName = "timeseries_time_series";
$this->label = "Time Series";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "timeseries_time_series";
$this->id->externalTableName = "timeseries_time_series";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "timeseries_time_series_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->timeSeries = new \Nemundo\Model\Type\Text\TextType($this);
$this->timeSeries->tableName = "timeseries_time_series";
$this->timeSeries->externalTableName = "timeseries_time_series";
$this->timeSeries->fieldName = "time_series";
$this->timeSeries->aliasFieldName = "timeseries_time_series_time_series";
$this->timeSeries->label = "Time Series";
$this->timeSeries->allowNullValue = true;
$this->timeSeries->length = 255;

$this->uniqueName = new \Nemundo\Model\Type\Text\TextType($this);
$this->uniqueName->tableName = "timeseries_time_series";
$this->uniqueName->externalTableName = "timeseries_time_series";
$this->uniqueName->fieldName = "unique_name";
$this->uniqueName->aliasFieldName = "timeseries_time_series_unique_name";
$this->uniqueName->label = "Unique Name";
$this->uniqueName->allowNullValue = true;
$this->uniqueName->length = 255;

$this->source = new \Nemundo\Model\Type\Text\TextType($this);
$this->source->tableName = "timeseries_time_series";
$this->source->externalTableName = "timeseries_time_series";
$this->source->fieldName = "source";
$this->source->aliasFieldName = "timeseries_time_series_source";
$this->source->label = "Source";
$this->source->allowNullValue = true;
$this->source->length = 255;

$this->sourceUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->sourceUrl->tableName = "timeseries_time_series";
$this->sourceUrl->externalTableName = "timeseries_time_series";
$this->sourceUrl->fieldName = "source_url";
$this->sourceUrl->aliasFieldName = "timeseries_time_series_source_url";
$this->sourceUrl->label = "Source Url";
$this->sourceUrl->allowNullValue = true;
$this->sourceUrl->length = 255;

$this->lastUpdate = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->lastUpdate->tableName = "timeseries_time_series";
$this->lastUpdate->externalTableName = "timeseries_time_series";
$this->lastUpdate->fieldName = "last_update";
$this->lastUpdate->aliasFieldName = "timeseries_time_series_last_update";
$this->lastUpdate->label = "Last Update";
$this->lastUpdate->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "unique_name";
$index->addType($this->uniqueName);

}
}