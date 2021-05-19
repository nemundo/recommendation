<?php
namespace Nemundo\Content\Index\Tree\Data\RestrictedContentType;
class RestrictedContentTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $restrictedContentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $restrictedContentType;

protected function loadModel() {
$this->tableName = "tree_restricted_content_type";
$this->aliasTableName = "tree_restricted_content_type";
$this->label = "Restricted Content Type";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "tree_restricted_content_type";
$this->id->externalTableName = "tree_restricted_content_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "tree_restricted_content_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "tree_restricted_content_type";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "tree_restricted_content_type_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = false;

$this->restrictedContentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->restrictedContentTypeId->tableName = "tree_restricted_content_type";
$this->restrictedContentTypeId->fieldName = "restricted_content_type";
$this->restrictedContentTypeId->aliasFieldName = "tree_restricted_content_type_restricted_content_type";
$this->restrictedContentTypeId->label = "Restricted Content Type";
$this->restrictedContentTypeId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content_type_restricted_content_type";
$index->addType($this->contentTypeId);
$index->addType($this->restrictedContentTypeId);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "tree_restricted_content_type_content_type");
$this->contentType->tableName = "tree_restricted_content_type";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "tree_restricted_content_type_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
public function loadRestrictedContentType() {
if ($this->restrictedContentType == null) {
$this->restrictedContentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "tree_restricted_content_type_restricted_content_type");
$this->restrictedContentType->tableName = "tree_restricted_content_type";
$this->restrictedContentType->fieldName = "restricted_content_type";
$this->restrictedContentType->aliasFieldName = "tree_restricted_content_type_restricted_content_type";
$this->restrictedContentType->label = "Restricted Content Type";
}
return $this;
}
}