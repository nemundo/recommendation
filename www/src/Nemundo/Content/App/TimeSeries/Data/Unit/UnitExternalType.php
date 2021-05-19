<?php
namespace Nemundo\Content\App\TimeSeries\Data\Unit;
class UnitExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $unit;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = UnitModel::class;
$this->externalTableName = "timeseries_unit";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->unit = new \Nemundo\Model\Type\Text\TextType();
$this->unit->fieldName = "unit";
$this->unit->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->unit->externalTableName = $this->externalTableName;
$this->unit->aliasFieldName = $this->unit->tableName . "_" . $this->unit->fieldName;
$this->unit->label = "Unit";
$this->addType($this->unit);

}
}