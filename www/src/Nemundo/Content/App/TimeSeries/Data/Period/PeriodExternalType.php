<?php
namespace Nemundo\Content\App\TimeSeries\Data\Period;
class PeriodExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $year;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $date;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $week;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $periodTypeId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeExternalType
*/
public $periodType;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $weekYear;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $month;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $monthYear;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PeriodModel::class;
$this->externalTableName = "timeseries_period";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->year = new \Nemundo\Model\Type\Number\NumberType();
$this->year->fieldName = "year";
$this->year->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->year->externalTableName = $this->externalTableName;
$this->year->aliasFieldName = $this->year->tableName . "_" . $this->year->fieldName;
$this->year->label = "Year";
$this->addType($this->year);

$this->date = new \Nemundo\Model\Type\DateTime\DateType();
$this->date->fieldName = "date";
$this->date->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->date->externalTableName = $this->externalTableName;
$this->date->aliasFieldName = $this->date->tableName . "_" . $this->date->fieldName;
$this->date->label = "Date";
$this->addType($this->date);

$this->week = new \Nemundo\Model\Type\Number\NumberType();
$this->week->fieldName = "week";
$this->week->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->week->externalTableName = $this->externalTableName;
$this->week->aliasFieldName = $this->week->tableName . "_" . $this->week->fieldName;
$this->week->label = "Week";
$this->addType($this->week);

$this->periodTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->periodTypeId->fieldName = "period_type";
$this->periodTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->periodTypeId->aliasFieldName = $this->periodTypeId->tableName ."_".$this->periodTypeId->fieldName;
$this->periodTypeId->label = "Period Type";
$this->addType($this->periodTypeId);

$this->weekYear = new \Nemundo\Model\Type\Number\NumberType();
$this->weekYear->fieldName = "week_year";
$this->weekYear->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->weekYear->externalTableName = $this->externalTableName;
$this->weekYear->aliasFieldName = $this->weekYear->tableName . "_" . $this->weekYear->fieldName;
$this->weekYear->label = "Week Year";
$this->addType($this->weekYear);

$this->month = new \Nemundo\Model\Type\Number\NumberType();
$this->month->fieldName = "month";
$this->month->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->month->externalTableName = $this->externalTableName;
$this->month->aliasFieldName = $this->month->tableName . "_" . $this->month->fieldName;
$this->month->label = "Month";
$this->addType($this->month);

$this->monthYear = new \Nemundo\Model\Type\Number\NumberType();
$this->monthYear->fieldName = "month_year";
$this->monthYear->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->monthYear->externalTableName = $this->externalTableName;
$this->monthYear->aliasFieldName = $this->monthYear->tableName . "_" . $this->monthYear->fieldName;
$this->monthYear->label = "Month Year";
$this->addType($this->monthYear);

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