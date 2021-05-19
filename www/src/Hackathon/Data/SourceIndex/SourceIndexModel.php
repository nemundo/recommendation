<?php
namespace Hackathon\Data\SourceIndex;
class SourceIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $source;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $uniqueUrl;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $newsTypeId;

/**
* @var \Hackathon\Data\NewsType\NewsTypeExternalType
*/
public $newsType;

protected function loadModel() {
$this->tableName = "hackathon_source_index";
$this->aliasTableName = "hackathon_source_index";
$this->label = "Source Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hackathon_source_index";
$this->id->externalTableName = "hackathon_source_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hackathon_source_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->source = new \Nemundo\Model\Type\Text\TextType($this);
$this->source->tableName = "hackathon_source_index";
$this->source->externalTableName = "hackathon_source_index";
$this->source->fieldName = "source";
$this->source->aliasFieldName = "hackathon_source_index_source";
$this->source->label = "Source";
$this->source->allowNullValue = false;
$this->source->length = 255;

$this->uniqueUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->uniqueUrl->tableName = "hackathon_source_index";
$this->uniqueUrl->externalTableName = "hackathon_source_index";
$this->uniqueUrl->fieldName = "unique_url";
$this->uniqueUrl->aliasFieldName = "hackathon_source_index_unique_url";
$this->uniqueUrl->label = "Unique Url";
$this->uniqueUrl->allowNullValue = true;
$this->uniqueUrl->length = 255;

$this->newsTypeId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->newsTypeId->tableName = "hackathon_source_index";
$this->newsTypeId->fieldName = "news_type";
$this->newsTypeId->aliasFieldName = "hackathon_source_index_news_type";
$this->newsTypeId->label = "News Type";
$this->newsTypeId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "unique";
$index->addType($this->uniqueUrl);
$index->addType($this->newsTypeId);

}
public function loadNewsType() {
if ($this->newsType == null) {
$this->newsType = new \Hackathon\Data\NewsType\NewsTypeExternalType($this, "hackathon_source_index_news_type");
$this->newsType->tableName = "hackathon_source_index";
$this->newsType->fieldName = "news_type";
$this->newsType->aliasFieldName = "hackathon_source_index_news_type";
$this->newsType->label = "News Type";
}
return $this;
}
}