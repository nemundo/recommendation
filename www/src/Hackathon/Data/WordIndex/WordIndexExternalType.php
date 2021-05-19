<?php
namespace Hackathon\Data\WordIndex;
class WordIndexExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $wordId;

/**
* @var \Hackathon\Data\Word\WordExternalType
*/
public $word;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $newsId;

/**
* @var \Hackathon\Data\NewsIndex\NewsIndexExternalType
*/
public $news;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = WordIndexModel::class;
$this->externalTableName = "hackathon_word_index";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->wordId = new \Nemundo\Model\Type\Id\IdType();
$this->wordId->fieldName = "word";
$this->wordId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->wordId->aliasFieldName = $this->wordId->tableName ."_".$this->wordId->fieldName;
$this->wordId->label = "Word";
$this->addType($this->wordId);

$this->newsId = new \Nemundo\Model\Type\Id\IdType();
$this->newsId->fieldName = "news";
$this->newsId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->newsId->aliasFieldName = $this->newsId->tableName ."_".$this->newsId->fieldName;
$this->newsId->label = "News";
$this->addType($this->newsId);

}
public function loadWord() {
if ($this->word == null) {
$this->word = new \Hackathon\Data\Word\WordExternalType(null, $this->parentFieldName . "_word");
$this->word->fieldName = "word";
$this->word->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->word->aliasFieldName = $this->word->tableName ."_".$this->word->fieldName;
$this->word->label = "Word";
$this->addType($this->word);
}
return $this;
}
public function loadNews() {
if ($this->news == null) {
$this->news = new \Hackathon\Data\NewsIndex\NewsIndexExternalType(null, $this->parentFieldName . "_news");
$this->news->fieldName = "news";
$this->news->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->news->aliasFieldName = $this->news->tableName ."_".$this->news->fieldName;
$this->news->label = "News";
$this->addType($this->news);
}
return $this;
}
}