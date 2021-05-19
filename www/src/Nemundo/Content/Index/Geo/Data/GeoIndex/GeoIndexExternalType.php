<?php
namespace Nemundo\Content\Index\Geo\Data\GeoIndex;
class GeoIndexExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Geo\GeoCoordinateType
*/
public $coordinate;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $place;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = GeoIndexModel::class;
$this->externalTableName = "content_geo_index";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->coordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateType();
$this->coordinate->fieldName = "coordinate";
$this->coordinate->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->coordinate->externalTableName = $this->externalTableName;
$this->coordinate->aliasFieldName = $this->coordinate->tableName . "_" . $this->coordinate->fieldName;
$this->coordinate->label = "Coordinate";
$this->coordinate->createObject();
$this->addType($this->coordinate);

$this->place = new \Nemundo\Model\Type\Text\TextType();
$this->place->fieldName = "place";
$this->place->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->place->externalTableName = $this->externalTableName;
$this->place->aliasFieldName = $this->place->tableName . "_" . $this->place->fieldName;
$this->place->label = "Place";
$this->addType($this->place);

$this->contentId = new \Nemundo\Model\Type\Id\IdType();
$this->contentId->fieldName = "content";
$this->contentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentId->aliasFieldName = $this->contentId->tableName ."_".$this->contentId->fieldName;
$this->contentId->label = "Content";
$this->addType($this->contentId);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content");
$this->content->fieldName = "content";
$this->content->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->content->aliasFieldName = $this->content->tableName ."_".$this->content->fieldName;
$this->content->label = "Content";
$this->addType($this->content);
}
return $this;
}
}