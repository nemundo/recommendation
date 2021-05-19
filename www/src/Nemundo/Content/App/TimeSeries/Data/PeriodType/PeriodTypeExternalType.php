<?php
namespace Nemundo\Content\App\TimeSeries\Data\PeriodType;
class PeriodTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $periodType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PeriodTypeModel::class;
$this->externalTableName = "timeseries_period_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->periodType = new \Nemundo\Model\Type\Text\TextType();
$this->periodType->fieldName = "period_type";
$this->periodType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->periodType->externalTableName = $this->externalTableName;
$this->periodType->aliasFieldName = $this->periodType->tableName . "_" . $this->periodType->fieldName;
$this->periodType->label = "Period Type";
$this->addType($this->periodType);

}
}