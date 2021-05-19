<?php
namespace Nemundo\App\Help\Data\Code;
class CodeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $topicId;

/**
* @var \Nemundo\App\Help\Data\Topic\TopicExternalType
*/
public $topic;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $code;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = CodeModel::class;
$this->externalTableName = "help_code";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->topicId = new \Nemundo\Model\Type\Id\IdType();
$this->topicId->fieldName = "topic";
$this->topicId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->topicId->aliasFieldName = $this->topicId->tableName ."_".$this->topicId->fieldName;
$this->topicId->label = "Topic";
$this->addType($this->topicId);

$this->code = new \Nemundo\Model\Type\Text\LargeTextType();
$this->code->fieldName = "code";
$this->code->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->code->externalTableName = $this->externalTableName;
$this->code->aliasFieldName = $this->code->tableName . "_" . $this->code->fieldName;
$this->code->label = "Code";
$this->addType($this->code);

$this->title = new \Nemundo\Model\Type\Text\TextType();
$this->title->fieldName = "title";
$this->title->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->title->externalTableName = $this->externalTableName;
$this->title->aliasFieldName = $this->title->tableName . "_" . $this->title->fieldName;
$this->title->label = "Title";
$this->addType($this->title);

}
public function loadTopic() {
if ($this->topic == null) {
$this->topic = new \Nemundo\App\Help\Data\Topic\TopicExternalType(null, $this->parentFieldName . "_topic");
$this->topic->fieldName = "topic";
$this->topic->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->topic->aliasFieldName = $this->topic->tableName ."_".$this->topic->fieldName;
$this->topic->label = "Topic";
$this->addType($this->topic);
}
return $this;
}
}