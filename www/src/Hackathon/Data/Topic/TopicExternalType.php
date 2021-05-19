<?php
namespace Hackathon\Data\Topic;
class TopicExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $topic;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TopicModel::class;
$this->externalTableName = "hackathon_topic";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->topic = new \Nemundo\Model\Type\Text\TextType();
$this->topic->fieldName = "topic";
$this->topic->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->topic->externalTableName = $this->externalTableName;
$this->topic->aliasFieldName = $this->topic->tableName . "_" . $this->topic->fieldName;
$this->topic->label = "Topic";
$this->addType($this->topic);

}
}