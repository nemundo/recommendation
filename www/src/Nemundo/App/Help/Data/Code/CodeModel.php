<?php
namespace Nemundo\App\Help\Data\Code;
class CodeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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

protected function loadModel() {
$this->tableName = "help_code";
$this->aliasTableName = "help_code";
$this->label = "Code";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "help_code";
$this->id->externalTableName = "help_code";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "help_code_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->topicId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->topicId->tableName = "help_code";
$this->topicId->fieldName = "topic";
$this->topicId->aliasFieldName = "help_code_topic";
$this->topicId->label = "Topic";
$this->topicId->allowNullValue = false;

$this->code = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->code->tableName = "help_code";
$this->code->externalTableName = "help_code";
$this->code->fieldName = "code";
$this->code->aliasFieldName = "help_code_code";
$this->code->label = "Code";
$this->code->allowNullValue = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "help_code";
$this->title->externalTableName = "help_code";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "help_code_title";
$this->title->label = "Title";
$this->title->allowNullValue = false;
$this->title->length = 255;

}
public function loadTopic() {
if ($this->topic == null) {
$this->topic = new \Nemundo\App\Help\Data\Topic\TopicExternalType($this, "help_code_topic");
$this->topic->tableName = "help_code";
$this->topic->fieldName = "topic";
$this->topic->aliasFieldName = "help_code_topic";
$this->topic->label = "Topic";
}
return $this;
}
}