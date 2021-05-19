<?php
namespace Nemundo\Content\App\Store\Data\NumberStore;
class NumberStoreModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $number;

protected function loadModel() {
$this->tableName = "store_number_store";
$this->aliasTableName = "store_number_store";
$this->label = "Number Store";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "store_number_store";
$this->id->externalTableName = "store_number_store";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "store_number_store_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->number = new \Nemundo\Model\Type\Number\NumberType($this);
$this->number->tableName = "store_number_store";
$this->number->externalTableName = "store_number_store";
$this->number->fieldName = "number";
$this->number->aliasFieldName = "store_number_store_number";
$this->number->label = "Number";
$this->number->allowNullValue = false;

}
}