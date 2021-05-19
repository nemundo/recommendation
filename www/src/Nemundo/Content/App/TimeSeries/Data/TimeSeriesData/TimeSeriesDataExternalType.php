<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesData;
class TimeSeriesDataExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $lineId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\Line\LineExternalType
*/
public $line;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TimeSeriesDataModel::class;
$this->externalTableName = "timeseries_timeseries_data";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->periodId = new \Nemundo\Model\Type\Id\IdType();
$this->periodId->fieldName = "period";
$this->periodId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->periodId->aliasFieldName = $this->periodId->tableName ."_".$this->periodId->fieldName;
$this->periodId->label = "Period";
$this->addType($this->periodId);

$this->value = new \Nemundo\Model\Type\Number\NumberType();
$this->value->fieldName = "value";
$this->value->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->value->externalTableName = $this->externalTableName;
$this->value->aliasFieldName = $this->value->tableName . "_" . $this->value->fieldName;
$this->value->label = "Value";
$this->addType($this->value);

$this->lineId = new \Nemundo\Model\Type\Id\IdType();
$this->lineId->fieldName = "line";
$this->lineId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->lineId->aliasFieldName = $this->lineId->tableName ."_".$this->lineId->fieldName;
$this->lineId->label = "Line";
$this->addType($this->lineId);

}
public function loadPeriod() {
if ($this->period == null) {
$this->period = new \Nemundo\Content\App\TimeSeries\Data\Period\PeriodExternalType(null, $this->parentFieldName . "_period");
$this->period->fieldName = "period";
$this->period->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->period->aliasFieldName = $this->period->tableName ."_".$this->period->fieldName;
$this->period->label = "Period";
$this->addType($this->period);
}
return $this;
}
public function loadLine() {
if ($this->line == null) {
$this->line = new \Nemundo\Content\App\TimeSeries\Data\Line\LineExternalType(null, $this->parentFieldName . "_line");
$this->line->fieldName = "line";
$this->line->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->line->aliasFieldName = $this->line->tableName ."_".$this->line->fieldName;
$this->line->label = "Line";
$this->addType($this->line);
}
return $this;
}
}