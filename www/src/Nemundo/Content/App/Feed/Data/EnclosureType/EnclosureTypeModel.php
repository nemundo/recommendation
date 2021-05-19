<?php
namespace Nemundo\Content\App\Feed\Data\EnclosureType;
class EnclosureTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $eenclosureType;

protected function loadModel() {
$this->tableName = "feed_enclosure_type";
$this->aliasTableName = "feed_enclosure_type";
$this->label = "Enclosure Type";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "feed_enclosure_type";
$this->id->externalTableName = "feed_enclosure_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "feed_enclosure_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->eenclosureType = new \Nemundo\Model\Type\Text\TextType($this);
$this->eenclosureType->tableName = "feed_enclosure_type";
$this->eenclosureType->externalTableName = "feed_enclosure_type";
$this->eenclosureType->fieldName = "eenclosure_type";
$this->eenclosureType->aliasFieldName = "feed_enclosure_type_eenclosure_type";
$this->eenclosureType->label = "Eenclosure Type";
$this->eenclosureType->allowNullValue = true;
$this->eenclosureType->length = 20;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "enclosure_type";
$index->addType($this->eenclosureType);

}
}