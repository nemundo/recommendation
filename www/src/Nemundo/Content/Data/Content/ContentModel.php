<?php
namespace Nemundo\Content\Data\Content;
class ContentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

protected function loadModel() {
$this->tableName = "content_content";
$this->aliasTableName = "content_content";
$this->label = "Content";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_content";
$this->id->externalTableName = "content_content";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_content_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->dataId = new \Nemundo\Model\Type\Text\TextType($this);
$this->dataId->tableName = "content_content";
$this->dataId->externalTableName = "content_content";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "content_content_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = true;
$this->dataId->length = 36;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "content_content";
$this->subject->externalTableName = "content_content";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "content_content_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = true;
$this->subject->length = 255;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "content_content";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "content_content_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "content_type";
$index->addType($this->contentTypeId);

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content_type_data_id";
$index->addType($this->contentTypeId);
$index->addType($this->dataId);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "content_content_content_type");
$this->contentType->tableName = "content_content";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "content_content_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}