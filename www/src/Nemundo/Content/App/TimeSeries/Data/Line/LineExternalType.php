<?php
namespace Nemundo\Content\App\TimeSeries\Data\Line;
class LineExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Text\TextType
*/
public $line;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $uniqueName;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LineModel::class;
$this->externalTableName = "timeseries_line";
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

$this->line = new \Nemundo\Model\Type\Text\TextType();
$this->line->fieldName = "line";
$this->line->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->line->externalTableName = $this->externalTableName;
$this->line->aliasFieldName = $this->line->tableName . "_" . $this->line->fieldName;
$this->line->label = "Line";
$this->addType($this->line);

$this->uniqueName = new \Nemundo\Model\Type\Text\TextType();
$this->uniqueName->fieldName = "unique_name";
$this->uniqueName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->uniqueName->externalTableName = $this->externalTableName;
$this->uniqueName->aliasFieldName = $this->uniqueName->tableName . "_" . $this->uniqueName->fieldName;
$this->uniqueName->label = "Unique Name";
$this->addType($this->uniqueName);

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