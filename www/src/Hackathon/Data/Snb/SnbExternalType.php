<?php
namespace Hackathon\Data\Snb;
class SnbExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $month;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $year;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $devisen;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = SnbModel::class;
$this->externalTableName = "hackathon_snb";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->month = new \Nemundo\Model\Type\Number\NumberType();
$this->month->fieldName = "month";
$this->month->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->month->externalTableName = $this->externalTableName;
$this->month->aliasFieldName = $this->month->tableName . "_" . $this->month->fieldName;
$this->month->label = "Month";
$this->addType($this->month);

$this->year = new \Nemundo\Model\Type\Number\NumberType();
$this->year->fieldName = "year";
$this->year->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->year->externalTableName = $this->externalTableName;
$this->year->aliasFieldName = $this->year->tableName . "_" . $this->year->fieldName;
$this->year->label = "Year";
$this->addType($this->year);

$this->devisen = new \Nemundo\Model\Type\Number\NumberType();
$this->devisen->fieldName = "devisen";
$this->devisen->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->devisen->externalTableName = $this->externalTableName;
$this->devisen->aliasFieldName = $this->devisen->tableName . "_" . $this->devisen->fieldName;
$this->devisen->label = "Devisen";
$this->addType($this->devisen);

}
}