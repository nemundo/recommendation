<?php
namespace Nemundo\Content\Data\ContentTypeCollectionContentType;
class ContentTypeCollectionContentTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $collectionId;

/**
* @var \Nemundo\Content\Data\ContentTypeCollection\ContentTypeCollectionExternalType
*/
public $collection;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ContentTypeCollectionContentTypeModel::class;
$this->externalTableName = "content_content_type_collection_content_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->collectionId = new \Nemundo\Model\Type\Id\IdType();
$this->collectionId->fieldName = "collection";
$this->collectionId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->collectionId->aliasFieldName = $this->collectionId->tableName ."_".$this->collectionId->fieldName;
$this->collectionId->label = "Collection";
$this->addType($this->collectionId);

$this->contentTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentTypeId->aliasFieldName = $this->contentTypeId->tableName ."_".$this->contentTypeId->fieldName;
$this->contentTypeId->label = "Content Type";
$this->addType($this->contentTypeId);

}
public function loadCollection() {
if ($this->collection == null) {
$this->collection = new \Nemundo\Content\Data\ContentTypeCollection\ContentTypeCollectionExternalType(null, $this->parentFieldName . "_collection");
$this->collection->fieldName = "collection";
$this->collection->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->collection->aliasFieldName = $this->collection->tableName ."_".$this->collection->fieldName;
$this->collection->label = "Collection";
$this->addType($this->collection);
}
return $this;
}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_content_type");
$this->contentType->fieldName = "content_type";
$this->contentType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentType->aliasFieldName = $this->contentType->tableName ."_".$this->contentType->fieldName;
$this->contentType->label = "Content Type";
$this->addType($this->contentType);
}
return $this;
}
}