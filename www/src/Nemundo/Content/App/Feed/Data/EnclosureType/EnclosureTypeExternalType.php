<?php
namespace Nemundo\Content\App\Feed\Data\EnclosureType;
class EnclosureTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $eenclosureType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = EnclosureTypeModel::class;
$this->externalTableName = "feed_enclosure_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->eenclosureType = new \Nemundo\Model\Type\Text\TextType();
$this->eenclosureType->fieldName = "eenclosure_type";
$this->eenclosureType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->eenclosureType->externalTableName = $this->externalTableName;
$this->eenclosureType->aliasFieldName = $this->eenclosureType->tableName . "_" . $this->eenclosureType->fieldName;
$this->eenclosureType->label = "Eenclosure Type";
$this->addType($this->eenclosureType);

}
}