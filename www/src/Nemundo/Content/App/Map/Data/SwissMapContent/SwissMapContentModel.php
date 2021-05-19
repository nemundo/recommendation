<?php
namespace Nemundo\Content\App\Map\Data\SwissMapContent;
class SwissMapContentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Geo\GeoCoordinateType
*/
public $geoCoordinate;

protected function loadModel() {
$this->tableName = "map_swiss_map_content";
$this->aliasTableName = "map_swiss_map_content";
$this->label = "Swiss Map Content";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "map_swiss_map_content";
$this->id->externalTableName = "map_swiss_map_content";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "map_swiss_map_content_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->geoCoordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateType($this);
$this->geoCoordinate->tableName = "map_swiss_map_content";
$this->geoCoordinate->externalTableName = "map_swiss_map_content";
$this->geoCoordinate->fieldName = "geo_coordinate";
$this->geoCoordinate->aliasFieldName = "map_swiss_map_content_geo_coordinate";
$this->geoCoordinate->label = "Geo Coordinate";
$this->geoCoordinate->allowNullValue = true;

}
}