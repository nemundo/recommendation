<?php
namespace Nemundo\Content\App\Contact\Data\Phone;
class PhoneExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phone;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PhoneModel::class;
$this->externalTableName = "contact_phone";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->phone = new \Nemundo\Model\Type\Text\TextType();
$this->phone->fieldName = "phone";
$this->phone->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->phone->externalTableName = $this->externalTableName;
$this->phone->aliasFieldName = $this->phone->tableName . "_" . $this->phone->fieldName;
$this->phone->label = "Phone";
$this->addType($this->phone);

}
}