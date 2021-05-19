<?php
namespace Hackathon\Data\Topic;
class TopicModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $topic;

protected function loadModel() {
$this->tableName = "hackathon_topic";
$this->aliasTableName = "hackathon_topic";
$this->label = "Topic";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hackathon_topic";
$this->id->externalTableName = "hackathon_topic";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hackathon_topic_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->topic = new \Nemundo\Model\Type\Text\TextType($this);
$this->topic->tableName = "hackathon_topic";
$this->topic->externalTableName = "hackathon_topic";
$this->topic->fieldName = "topic";
$this->topic->aliasFieldName = "hackathon_topic_topic";
$this->topic->label = "Topic";
$this->topic->allowNullValue = false;
$this->topic->length = 255;

}
}