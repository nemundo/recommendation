<?php
namespace Nemundo\Content\Index\Search\Data\WordContentType;
class WordContentTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\Text\TextType
*/
public $word;

protected function loadModel() {
$this->tableName = "content_search_word_content_type";
$this->aliasTableName = "content_search_word_content_type";
$this->label = "Word Content Type";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_search_word_content_type";
$this->id->externalTableName = "content_search_word_content_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_search_word_content_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "content_search_word_content_type";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "content_search_word_content_type_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = false;

$this->word = new \Nemundo\Model\Type\Text\TextType($this);
$this->word->tableName = "content_search_word_content_type";
$this->word->externalTableName = "content_search_word_content_type";
$this->word->fieldName = "word";
$this->word->aliasFieldName = "content_search_word_content_type_word";
$this->word->label = "Word";
$this->word->allowNullValue = false;
$this->word->length = 50;

$index = new \Nemundo\Model\Definition\Index\ModelSearchIndex($this);
$index->indexName = "search";
$index->addType($this->word);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "content_search_word_content_type_content_type");
$this->contentType->tableName = "content_search_word_content_type";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "content_search_word_content_type_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}