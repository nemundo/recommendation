<?php
namespace Nemundo\Content\App\Feiertag\Data\Feiertag;
class FeiertagExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $datum;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $feiertag;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = FeiertagModel::class;
$this->externalTableName = "feiertag_feiertag";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->datum = new \Nemundo\Model\Type\DateTime\DateType();
$this->datum->fieldName = "datum";
$this->datum->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->datum->externalTableName = $this->externalTableName;
$this->datum->aliasFieldName = $this->datum->tableName . "_" . $this->datum->fieldName;
$this->datum->label = "Datum";
$this->addType($this->datum);

$this->feiertag = new \Nemundo\Model\Type\Text\TextType();
$this->feiertag->fieldName = "feiertag";
$this->feiertag->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->feiertag->externalTableName = $this->externalTableName;
$this->feiertag->aliasFieldName = $this->feiertag->tableName . "_" . $this->feiertag->fieldName;
$this->feiertag->label = "Feiertag";
$this->addType($this->feiertag);

}
}