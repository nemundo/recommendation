<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeries;
class TimeSeriesExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TimeSeriesModel::class;
$this->externalTableName = "timeseries_time_series";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->timeSeries = new \Nemundo\Model\Type\Text\TextType();
$this->timeSeries->fieldName = "time_series";
$this->timeSeries->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->timeSeries->externalTableName = $this->externalTableName;
$this->timeSeries->aliasFieldName = $this->timeSeries->tableName . "_" . $this->timeSeries->fieldName;
$this->timeSeries->label = "Time Series";
$this->addType($this->timeSeries);

$this->uniqueName = new \Nemundo\Model\Type\Text\TextType();
$this->uniqueName->fieldName = "unique_name";
$this->uniqueName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->uniqueName->externalTableName = $this->externalTableName;
$this->uniqueName->aliasFieldName = $this->uniqueName->tableName . "_" . $this->uniqueName->fieldName;
$this->uniqueName->label = "Unique Name";
$this->addType($this->uniqueName);

$this->source = new \Nemundo\Model\Type\Text\TextType();
$this->source->fieldName = "source";
$this->source->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->source->externalTableName = $this->externalTableName;
$this->source->aliasFieldName = $this->source->tableName . "_" . $this->source->fieldName;
$this->source->label = "Source";
$this->addType($this->source);

$this->sourceUrl = new \Nemundo\Model\Type\Text\TextType();
$this->sourceUrl->fieldName = "source_url";
$this->sourceUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sourceUrl->externalTableName = $this->externalTableName;
$this->sourceUrl->aliasFieldName = $this->sourceUrl->tableName . "_" . $this->sourceUrl->fieldName;
$this->sourceUrl->label = "Source Url";
$this->addType($this->sourceUrl);

$this->lastUpdate = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->lastUpdate->fieldName = "last_update";
$this->lastUpdate->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->lastUpdate->externalTableName = $this->externalTableName;
$this->lastUpdate->aliasFieldName = $this->lastUpdate->tableName . "_" . $this->lastUpdate->fieldName;
$this->lastUpdate->label = "Last Update";
$this->addType($this->lastUpdate);

}
}