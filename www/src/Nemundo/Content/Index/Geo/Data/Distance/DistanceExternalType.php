<?php
namespace Nemundo\Content\Index\Geo\Data\Distance;
class DistanceExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentFromId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $contentFrom;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = DistanceModel::class;
$this->externalTableName = "geo_distance";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->contentFromId = new \Nemundo\Model\Type\Id\IdType();
$this->contentFromId->fieldName = "content_from";
$this->contentFromId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentFromId->aliasFieldName = $this->contentFromId->tableName ."_".$this->contentFromId->fieldName;
$this->contentFromId->label = "Content From";
$this->addType($this->contentFromId);

$this->contentToId = new \Nemundo\Model\Type\Id\IdType();
$this->contentToId->fieldName = "content_to";
$this->contentToId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentToId->aliasFieldName = $this->contentToId->tableName ."_".$this->contentToId->fieldName;
$this->contentToId->label = "Content To";
$this->addType($this->contentToId);

$this->distance = new \Nemundo\Model\Type\Number\NumberType();
$this->distance->fieldName = "distance";
$this->distance->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->distance->externalTableName = $this->externalTableName;
$this->distance->aliasFieldName = $this->distance->tableName . "_" . $this->distance->fieldName;
$this->distance->label = "Distance";
$this->addType($this->distance);

}
public function loadContentFrom() {
if ($this->contentFrom == null) {
$this->contentFrom = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content_from");
$this->contentFrom->fieldName = "content_from";
$this->contentFrom->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentFrom->aliasFieldName = $this->contentFrom->tableName ."_".$this->contentFrom->fieldName;
$this->contentFrom->label = "Content From";
$this->addType($this->contentFrom);
}
return $this;
}
public function loadContentTo() {
if ($this->contentTo == null) {
$this->contentTo = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content_to");
$this->contentTo->fieldName = "content_to";
$this->contentTo->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentTo->aliasFieldName = $this->contentTo->tableName ."_".$this->contentTo->fieldName;
$this->contentTo->label = "Content To";
$this->addType($this->contentTo);
}
return $this;
}
}