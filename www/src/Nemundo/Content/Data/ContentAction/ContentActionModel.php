<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
$this->tableName = "content_action";
$this->aliasTableName = "content_action";
$this->label = "Content Action";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_action";
$this->id->externalTableName = "content_action";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_action_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "content_action";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "content_action_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content_type";
$index->addType($this->contentTypeId);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "content_action_content_type");
$this->contentType->tableName = "content_action";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "content_action_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}