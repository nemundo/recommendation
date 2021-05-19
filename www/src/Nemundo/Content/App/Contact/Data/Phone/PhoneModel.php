<?php
namespace Nemundo\Content\App\Contact\Data\Phone;
class PhoneModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phone;

protected function loadModel() {
$this->tableName = "contact_phone";
$this->aliasTableName = "contact_phone";
$this->label = "Phone";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "contact_phone";
$this->id->externalTableName = "contact_phone";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "contact_phone_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->phone = new \Nemundo\Model\Type\Text\TextType($this);
$this->phone->tableName = "contact_phone";
$this->phone->externalTableName = "contact_phone";
$this->phone->fieldName = "phone";
$this->phone->aliasFieldName = "contact_phone_phone";
$this->phone->label = "Phone";
$this->phone->allowNullValue = true;
$this->phone->length = 255;

}
}