<?php
namespace Hackathon\Data\Word;
class WordModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $word;

protected function loadModel() {
$this->tableName = "hackathon_word";
$this->aliasTableName = "hackathon_word";
$this->label = "Word";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hackathon_word";
$this->id->externalTableName = "hackathon_word";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hackathon_word_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->word = new \Nemundo\Model\Type\Text\TextType($this);
$this->word->tableName = "hackathon_word";
$this->word->externalTableName = "hackathon_word";
$this->word->fieldName = "word";
$this->word->aliasFieldName = "hackathon_word_word";
$this->word->label = "word";
$this->word->allowNullValue = false;
$this->word->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "word";
$index->addType($this->word);

}
}