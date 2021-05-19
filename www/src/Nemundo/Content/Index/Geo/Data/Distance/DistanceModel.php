<?php
namespace Nemundo\Content\Index\Geo\Data\Distance;
class DistanceModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentFromId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $contentFrom;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentToId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $contentTo;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $distance;

protected function loadModel() {
$this->tableName = "geo_distance";
$this->aliasTableName = "geo_distance";
$this->label = "Distance";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "geo_distance";
$this->id->externalTableName = "geo_distance";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "geo_distance_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentFromId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentFromId->tableName = "geo_distance";
$this->contentFromId->fieldName = "content_from";
$this->contentFromId->aliasFieldName = "geo_distance_content_from";
$this->contentFromId->label = "Content From";
$this->contentFromId->allowNullValue = true;

$this->contentToId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentToId->tableName = "geo_distance";
$this->contentToId->fieldName = "content_to";
$this->contentToId->aliasFieldName = "geo_distance_content_to";
$this->contentToId->label = "Content To";
$this->contentToId->allowNullValue = true;

$this->distance = new \Nemundo\Model\Type\Number\NumberType($this);
$this->distance->tableName = "geo_distance";
$this->distance->externalTableName = "geo_distance";
$this->distance->fieldName = "distance";
$this->distance->aliasFieldName = "geo_distance_distance";
$this->distance->label = "Distance";
$this->distance->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "content_from_distance";
$index->addType($this->contentFromId);
$index->addType($this->distance);

}
public function loadContentFrom() {
if ($this->contentFrom == null) {
$this->contentFrom = new \Nemundo\Content\Data\Content\ContentExternalType($this, "geo_distance_content_from");
$this->contentFrom->tableName = "geo_distance";
$this->contentFrom->fieldName = "content_from";
$this->contentFrom->aliasFieldName = "geo_distance_content_from";
$this->contentFrom->label = "Content From";
}
return $this;
}
public function loadContentTo() {
if ($this->contentTo == null) {
$this->contentTo = new \Nemundo\Content\Data\Content\ContentExternalType($this, "geo_distance_content_to");
$this->contentTo->tableName = "geo_distance";
$this->contentTo->fieldName = "content_to";
$this->contentTo->aliasFieldName = "geo_distance_content_to";
$this->contentTo->label = "Content To";
}
return $this;
}
}