<?php
namespace Nemundo\Content\Data\ContentTypeCollectionContentType;
class ContentTypeCollectionContentTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $collectionId;

/**
* @var \Nemundo\Content\Data\ContentTypeCollection\ContentTypeCollectionExternalType
*/
public $collection;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

protected function loadModel() {
$this->tableName = "content_content_type_collection_content_type";
$this->aliasTableName = "content_content_type_collection_content_type";
$this->label = "Content Type Collection Content Type";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_content_type_collection_content_type";
$this->id->externalTableName = "content_content_type_collection_content_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_content_type_collection_content_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->collectionId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->collectionId->tableName = "content_content_type_collection_content_type";
$this->collectionId->fieldName = "collection";
$this->collectionId->aliasFieldName = "content_content_type_collection_content_type_collection";
$this->collectionId->label = "Collection";
$this->collectionId->allowNullValue = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "content_content_type_collection_content_type";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "content_content_type_collection_content_type_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "unique_index";
$index->addType($this->collectionId);
$index->addType($this->contentTypeId);

}
public function loadCollection() {
if ($this->collection == null) {
$this->collection = new \Nemundo\Content\Data\ContentTypeCollection\ContentTypeCollectionExternalType($this, "content_content_type_collection_content_type_collection");
$this->collection->tableName = "content_content_type_collection_content_type";
$this->collection->fieldName = "collection";
$this->collection->aliasFieldName = "content_content_type_collection_content_type_collection";
$this->collection->label = "Collection";
}
return $this;
}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "content_content_type_collection_content_type_content_type");
$this->contentType->tableName = "content_content_type_collection_content_type";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "content_content_type_collection_content_type_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}