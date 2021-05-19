<?php
namespace Hackathon\Data\NewsType;
class NewsTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
$this->tableName = "hackathon_news_type";
$this->aliasTableName = "hackathon_news_type";
$this->label = "News Type";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hackathon_news_type";
$this->id->externalTableName = "hackathon_news_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hackathon_news_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "hackathon_news_type";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "hackathon_news_type_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content_type";
$index->addType($this->contentTypeId);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "hackathon_news_type_content_type");
$this->contentType->tableName = "hackathon_news_type";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "hackathon_news_type_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}