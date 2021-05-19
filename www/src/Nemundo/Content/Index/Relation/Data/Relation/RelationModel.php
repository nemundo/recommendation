<?php
namespace Nemundo\Content\Index\Relation\Data\Relation;
class RelationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $fromId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $from;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $toId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $to;

protected function loadModel() {
$this->tableName = "relation_relation";
$this->aliasTableName = "relation_relation";
$this->label = "Relation";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "relation_relation";
$this->id->externalTableName = "relation_relation";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "relation_relation_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->fromId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->fromId->tableName = "relation_relation";
$this->fromId->fieldName = "from";
$this->fromId->aliasFieldName = "relation_relation_from";
$this->fromId->label = "From";
$this->fromId->allowNullValue = true;

$this->toId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->toId->tableName = "relation_relation";
$this->toId->fieldName = "to";
$this->toId->aliasFieldName = "relation_relation_to";
$this->toId->label = "To";
$this->toId->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "from_to";
$index->addType($this->fromId);
$index->addType($this->toId);

}
public function loadFrom() {
if ($this->from == null) {
$this->from = new \Nemundo\Content\Data\Content\ContentExternalType($this, "relation_relation_from");
$this->from->tableName = "relation_relation";
$this->from->fieldName = "from";
$this->from->aliasFieldName = "relation_relation_from";
$this->from->label = "From";
}
return $this;
}
public function loadTo() {
if ($this->to == null) {
$this->to = new \Nemundo\Content\Data\Content\ContentExternalType($this, "relation_relation_to");
$this->to->tableName = "relation_relation";
$this->to->fieldName = "to";
$this->to->aliasFieldName = "relation_relation_to";
$this->to->label = "To";
}
return $this;
}
}