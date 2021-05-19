<?php
namespace Nemundo\Content\App\TimeSeries\Data\Period;
class PeriodModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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

protected function loadModel() {
$this->tableName = "timeseries_period";
$this->aliasTableName = "timeseries_period";
$this->label = "Period";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "timeseries_period";
$this->id->externalTableName = "timeseries_period";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "timeseries_period_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->year = new \Nemundo\Model\Type\Number\NumberType($this);
$this->year->tableName = "timeseries_period";
$this->year->externalTableName = "timeseries_period";
$this->year->fieldName = "year";
$this->year->aliasFieldName = "timeseries_period_year";
$this->year->label = "Year";
$this->year->allowNullValue = true;

$this->date = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->date->tableName = "timeseries_period";
$this->date->externalTableName = "timeseries_period";
$this->date->fieldName = "date";
$this->date->aliasFieldName = "timeseries_period_date";
$this->date->label = "Date";
$this->date->allowNullValue = true;

$this->week = new \Nemundo\Model\Type\Number\NumberType($this);
$this->week->tableName = "timeseries_period";
$this->week->externalTableName = "timeseries_period";
$this->week->fieldName = "week";
$this->week->aliasFieldName = "timeseries_period_week";
$this->week->label = "Week";
$this->week->allowNullValue = true;

$this->periodTypeId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->periodTypeId->tableName = "timeseries_period";
$this->periodTypeId->fieldName = "period_type";
$this->periodTypeId->aliasFieldName = "timeseries_period_period_type";
$this->periodTypeId->label = "Period Type";
$this->periodTypeId->allowNullValue = true;

$this->weekYear = new \Nemundo\Model\Type\Number\NumberType($this);
$this->weekYear->tableName = "timeseries_period";
$this->weekYear->externalTableName = "timeseries_period";
$this->weekYear->fieldName = "week_year";
$this->weekYear->aliasFieldName = "timeseries_period_week_year";
$this->weekYear->label = "Week Year";
$this->weekYear->allowNullValue = true;

$this->month = new \Nemundo\Model\Type\Number\NumberType($this);
$this->month->tableName = "timeseries_period";
$this->month->externalTableName = "timeseries_period";
$this->month->fieldName = "month";
$this->month->aliasFieldName = "timeseries_period_month";
$this->month->label = "Month";
$this->month->allowNullValue = true;

$this->monthYear = new \Nemundo\Model\Type\Number\NumberType($this);
$this->monthYear->tableName = "timeseries_period";
$this->monthYear->externalTableName = "timeseries_period";
$this->monthYear->fieldName = "month_year";
$this->monthYear->aliasFieldName = "timeseries_period_month_year";
$this->monthYear->label = "Month Year";
$this->monthYear->allowNullValue = true;

}
public function loadPeriodType() {
if ($this->periodType == null) {
$this->periodType = new \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeExternalType($this, "timeseries_period_period_type");
$this->periodType->tableName = "timeseries_period";
$this->periodType->fieldName = "period_type";
$this->periodType->aliasFieldName = "timeseries_period_period_type";
$this->periodType->label = "Period Type";
}
return $this;
}
}