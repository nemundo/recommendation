<?php
namespace Nemundo\Content\Data\ViewContentType;
class ViewContentTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "content_view_content_type";
$this->aliasTableName = "content_view_content_type";
$this->label = "View Content Type";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_view_content_type";
$this->id->externalTableName = "content_view_content_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_view_content_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "content_view_content_type";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "content_view_content_type_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content_type";
$index->addType($this->contentTypeId);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "content_view_content_type_content_type");
$this->contentType->tableName = "content_view_content_type";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "content_view_content_type_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}