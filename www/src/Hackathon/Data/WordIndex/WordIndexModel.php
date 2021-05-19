<?php
namespace Hackathon\Data\WordIndex;
class WordIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $wordId;

/**
* @var \Hackathon\Data\Word\WordExternalType
*/
public $word;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $newsId;

/**
* @var \Hackathon\Data\NewsIndex\NewsIndexExternalType
*/
public $news;

protected function loadModel() {
$this->tableName = "hackathon_word_index";
$this->aliasTableName = "hackathon_word_index";
$this->label = "Word Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hackathon_word_index";
$this->id->externalTableName = "hackathon_word_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hackathon_word_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->wordId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->wordId->tableName = "hackathon_word_index";
$this->wordId->fieldName = "word";
$this->wordId->aliasFieldName = "hackathon_word_index_word";
$this->wordId->label = "Word";
$this->wordId->allowNullValue = false;

$this->newsId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->newsId->tableName = "hackathon_word_index";
$this->newsId->fieldName = "news";
$this->newsId->aliasFieldName = "hackathon_word_index_news";
$this->newsId->label = "News";
$this->newsId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "word";
$index->addType($this->wordId);

}
public function loadWord() {
if ($this->word == null) {
$this->word = new \Hackathon\Data\Word\WordExternalType($this, "hackathon_word_index_word");
$this->word->tableName = "hackathon_word_index";
$this->word->fieldName = "word";
$this->word->aliasFieldName = "hackathon_word_index_word";
$this->word->label = "Word";
}
return $this;
}
public function loadNews() {
if ($this->news == null) {
$this->news = new \Hackathon\Data\NewsIndex\NewsIndexExternalType($this, "hackathon_word_index_news");
$this->news->tableName = "hackathon_word_index";
$this->news->fieldName = "news";
$this->news->aliasFieldName = "hackathon_word_index_news";
$this->news->label = "News";
}
return $this;
}
}