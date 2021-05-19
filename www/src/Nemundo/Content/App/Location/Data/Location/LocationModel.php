<?php
namespace Nemundo\Content\App\Location\Data\Location;
class LocationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $location;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\Geo\GeoCoordinateType
*/
public $geoCoordinate;

protected function loadModel() {
$this->tableName = "location_location";
$this->aliasTableName = "location_location";
$this->label = "Location";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "location_location";
$this->id->externalTableName = "location_location";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "location_location_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->location = new \Nemundo\Model\Type\Text\TextType($this);
$this->location->tableName = "location_location";
$this->location->externalTableName = "location_location";
$this->location->fieldName = "location";
$this->location->aliasFieldName = "location_location_location";
$this->location->label = "Location";
$this->location->allowNullValue = true;
$this->location->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "location_location";
$this->description->externalTableName = "location_location";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "location_location_description";
$this->description->label = "Description";
$this->description->allowNullValue = true;

$this->geoCoordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateType($this);
$this->geoCoordinate->tableName = "location_location";
$this->geoCoordinate->externalTableName = "location_location";
$this->geoCoordinate->fieldName = "geo_coordinate";
$this->geoCoordinate->aliasFieldName = "location_location_geo_coordinate";
$this->geoCoordinate->label = "Geo Coordinate";
$this->geoCoordinate->allowNullValue = true;

}
}