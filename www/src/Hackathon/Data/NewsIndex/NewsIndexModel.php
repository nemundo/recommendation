<?php
namespace Hackathon\Data\NewsIndex;
class NewsIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $sourceId;

/**
* @var \Hackathon\Data\SourceIndex\SourceIndexExternalType
*/
public $source;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $newsTypeId;

/**
* @var \Hackathon\Data\NewsType\NewsTypeExternalType
*/
public $newsType;

protected function loadModel() {
$this->tableName = "hackathon_news_index";
$this->aliasTableName = "hackathon_news_index";
$this->label = "News Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hackathon_news_index";
$this->id->externalTableName = "hackathon_news_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hackathon_news_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "hackathon_news_index";
$this->title->externalTableName = "hackathon_news_index";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "hackathon_news_index_title";
$this->title->label = "Title";
$this->title->allowNullValue = false;
$this->title->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "hackathon_news_index";
$this->description->externalTableName = "hackathon_news_index";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "hackathon_news_index_description";
$this->description->label = "Description";
$this->description->allowNullValue = false;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "hackathon_news_index";
$this->url->externalTableName = "hackathon_news_index";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "hackathon_news_index_url";
$this->url->label = "Url";
$this->url->allowNullValue = false;
$this->url->length = 255;

$this->sourceId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->sourceId->tableName = "hackathon_news_index";
$this->sourceId->fieldName = "source";
$this->sourceId->aliasFieldName = "hackathon_news_index_source";
$this->sourceId->label = "Source";
$this->sourceId->allowNullValue = false;

$this->newsTypeId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->newsTypeId->tableName = "hackathon_news_index";
$this->newsTypeId->fieldName = "news_type";
$this->newsTypeId->aliasFieldName = "hackathon_news_index_news_type";
$this->newsTypeId->label = "News Type";
$this->newsTypeId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "url";
$index->addType($this->url);

}
public function loadSource() {
if ($this->source == null) {
$this->source = new \Hackathon\Data\SourceIndex\SourceIndexExternalType($this, "hackathon_news_index_source");
$this->source->tableName = "hackathon_news_index";
$this->source->fieldName = "source";
$this->source->aliasFieldName = "hackathon_news_index_source";
$this->source->label = "Source";
}
return $this;
}
public function loadNewsType() {
if ($this->newsType == null) {
$this->newsType = new \Hackathon\Data\NewsType\NewsTypeExternalType($this, "hackathon_news_index_news_type");
$this->newsType->tableName = "hackathon_news_index";
$this->newsType->fieldName = "news_type";
$this->newsType->aliasFieldName = "hackathon_news_index_news_type";
$this->newsType->label = "News Type";
}
return $this;
}
}