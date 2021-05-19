<?php
namespace Nemundo\Content\Index\Search\Data\SearchIndex;
class SearchIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $wordId;

/**
* @var \Nemundo\Content\Index\Search\Data\Word\WordExternalType
*/
public $word;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

protected function loadModel() {
$this->tableName = "content_search_index";
$this->aliasTableName = "content_search_index";
$this->label = "Search Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_search_index";
$this->id->externalTableName = "content_search_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_search_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "content_search_index";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "content_search_index_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

$this->wordId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->wordId->tableName = "content_search_index";
$this->wordId->fieldName = "word";
$this->wordId->aliasFieldName = "content_search_index_word";
$this->wordId->label = "Word";
$this->wordId->allowNullValue = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "content_search_index";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "content_search_index_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "word";
$index->addType($this->wordId);

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "content_type";
$index->addType($this->contentTypeId);
$index->addType($this->wordId);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "content_search_index_content");
$this->content->tableName = "content_search_index";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "content_search_index_content";
$this->content->label = "Content";
}
return $this;
}
public function loadWord() {
if ($this->word == null) {
$this->word = new \Nemundo\Content\Index\Search\Data\Word\WordExternalType($this, "content_search_index_word");
$this->word->tableName = "content_search_index";
$this->word->fieldName = "word";
$this->word->aliasFieldName = "content_search_index_word";
$this->word->label = "Word";
}
return $this;
}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "content_search_index_content_type");
$this->contentType->tableName = "content_search_index";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "content_search_index_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}