<?php
namespace Nemundo\Content\App\TimeSeries\Data\PeriodType;
class PeriodTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $periodType;

protected function loadModel() {
$this->tableName = "timeseries_period_type";
$this->aliasTableName = "timeseries_period_type";
$this->label = "Period Type";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "timeseries_period_type";
$this->id->externalTableName = "timeseries_period_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "timeseries_period_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->periodType = new \Nemundo\Model\Type\Text\TextType($this);
$this->periodType->tableName = "timeseries_period_type";
$this->periodType->externalTableName = "timeseries_period_type";
$this->periodType->fieldName = "period_type";
$this->periodType->aliasFieldName = "timeseries_period_type_period_type";
$this->periodType->label = "Period Type";
$this->periodType->allowNullValue = true;
$this->periodType->length = 255;

}
}