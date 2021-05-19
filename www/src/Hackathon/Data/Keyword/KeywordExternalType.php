<?php
namespace Hackathon\Data\Keyword;
class KeywordExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $keyword;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $topicId;

/**
* @var \Hackathon\Data\Topic\TopicExternalType
*/
public $topic;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = KeywordModel::class;
$this->externalTableName = "hackathon_keyword";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->keyword = new \Nemundo\Model\Type\Text\TextType();
$this->keyword->fieldName = "keyword";
$this->keyword->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->keyword->externalTableName = $this->externalTableName;
$this->keyword->aliasFieldName = $this->keyword->tableName . "_" . $this->keyword->fieldName;
$this->keyword->label = "Keyword";
$this->addType($this->keyword);

$this->topicId = new \Nemundo\Model\Type\Id\IdType();
$this->topicId->fieldName = "topic";
$this->topicId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->topicId->aliasFieldName = $this->topicId->tableName ."_".$this->topicId->fieldName;
$this->topicId->label = "Topic";
$this->addType($this->topicId);

}
public function loadTopic() {
if ($this->topic == null) {
$this->topic = new \Hackathon\Data\Topic\TopicExternalType(null, $this->parentFieldName . "_topic");
$this->topic->fieldName = "topic";
$this->topic->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->topic->aliasFieldName = $this->topic->tableName ."_".$this->topic->fieldName;
$this->topic->label = "Topic";
$this->addType($this->topic);
}
return $this;
}
}