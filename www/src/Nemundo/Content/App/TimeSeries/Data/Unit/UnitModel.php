<?php
namespace Nemundo\Content\App\TimeSeries\Data\Unit;
class UnitModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $unit;

protected function loadModel() {
$this->tableName = "timeseries_unit";
$this->aliasTableName = "timeseries_unit";
$this->label = "Unit";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "timeseries_unit";
$this->id->externalTableName = "timeseries_unit";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "timeseries_unit_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->unit = new \Nemundo\Model\Type\Text\TextType($this);
$this->unit->tableName = "timeseries_unit";
$this->unit->externalTableName = "timeseries_unit";
$this->unit->fieldName = "unit";
$this->unit->aliasFieldName = "timeseries_unit_unit";
$this->unit->label = "Unit";
$this->unit->allowNullValue = true;
$this->unit->length = 20;

}
}