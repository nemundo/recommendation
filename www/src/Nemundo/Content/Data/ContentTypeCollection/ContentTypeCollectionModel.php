<?php
namespace Nemundo\Content\Data\ContentTypeCollection;
class ContentTypeCollectionModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $collection;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phpClass;

protected function loadModel() {
$this->tableName = "content_content_type_collection";
$this->aliasTableName = "content_content_type_collection";
$this->label = "Content Type Collection";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_content_type_collection";
$this->id->externalTableName = "content_content_type_collection";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_content_type_collection_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->collection = new \Nemundo\Model\Type\Text\TextType($this);
$this->collection->tableName = "content_content_type_collection";
$this->collection->externalTableName = "content_content_type_collection";
$this->collection->fieldName = "collection";
$this->collection->aliasFieldName = "content_content_type_collection_collection";
$this->collection->label = "Collection";
$this->collection->allowNullValue = false;
$this->collection->length = 255;

$this->phpClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->phpClass->tableName = "content_content_type_collection";
$this->phpClass->externalTableName = "content_content_type_collection";
$this->phpClass->fieldName = "php_class";
$this->phpClass->aliasFieldName = "content_content_type_collection_php_class";
$this->phpClass->label = "Php Class";
$this->phpClass->allowNullValue = false;
$this->phpClass->length = 255;

}
}