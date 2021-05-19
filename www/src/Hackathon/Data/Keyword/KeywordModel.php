<?php
namespace Hackathon\Data\Keyword;
class KeywordModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $keyword;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $topicId;

/**
* @var \Hackathon\Data\Topic\TopicExternalType
*/
public $topic;

protected function loadModel() {
$this->tableName = "hackathon_keyword";
$this->aliasTableName = "hackathon_keyword";
$this->label = "Keyword";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hackathon_keyword";
$this->id->externalTableName = "hackathon_keyword";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hackathon_keyword_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->keyword = new \Nemundo\Model\Type\Text\TextType($this);
$this->keyword->tableName = "hackathon_keyword";
$this->keyword->externalTableName = "hackathon_keyword";
$this->keyword->fieldName = "keyword";
$this->keyword->aliasFieldName = "hackathon_keyword_keyword";
$this->keyword->label = "Keyword";
$this->keyword->allowNullValue = false;
$this->keyword->length = 255;

$this->topicId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->topicId->tableName = "hackathon_keyword";
$this->topicId->fieldName = "topic";
$this->topicId->aliasFieldName = "hackathon_keyword_topic";
$this->topicId->label = "Topic";
$this->topicId->allowNullValue = false;

}
public function loadTopic() {
if ($this->topic == null) {
$this->topic = new \Hackathon\Data\Topic\TopicExternalType($this, "hackathon_keyword_topic");
$this->topic->tableName = "hackathon_keyword";
$this->topic->fieldName = "topic";
$this->topic->aliasFieldName = "hackathon_keyword_topic";
$this->topic->label = "Topic";
}
return $this;
}
}