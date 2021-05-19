<?php
namespace Nemundo\Content\Data\IndexType;
class IndexTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $indexType;

protected function loadModel() {
$this->tableName = "content_index_type";
$this->aliasTableName = "content_index_type";
$this->label = "Index Type";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_index_type";
$this->id->externalTableName = "content_index_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_index_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->indexType = new \Nemundo\Model\Type\Text\TextType($this);
$this->indexType->tableName = "content_index_type";
$this->indexType->externalTableName = "content_index_type";
$this->indexType->fieldName = "index_type";
$this->indexType->aliasFieldName = "content_index_type_index_type";
$this->indexType->label = "Index Type";
$this->indexType->allowNullValue = false;
$this->indexType->length = 255;

}
}