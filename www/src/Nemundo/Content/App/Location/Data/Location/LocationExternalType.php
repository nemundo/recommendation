<?php
namespace Nemundo\Content\App\Location\Data\Location;
class LocationExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LocationModel::class;
$this->externalTableName = "location_location";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->location = new \Nemundo\Model\Type\Text\TextType();
$this->location->fieldName = "location";
$this->location->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->location->externalTableName = $this->externalTableName;
$this->location->aliasFieldName = $this->location->tableName . "_" . $this->location->fieldName;
$this->location->label = "Location";
$this->addType($this->location);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->externalTableName = $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Description";
$this->addType($this->description);

$this->geoCoordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateType();
$this->geoCoordinate->fieldName = "geo_coordinate";
$this->geoCoordinate->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->geoCoordinate->externalTableName = $this->externalTableName;
$this->geoCoordinate->aliasFieldName = $this->geoCoordinate->tableName . "_" . $this->geoCoordinate->fieldName;
$this->geoCoordinate->label = "Geo Coordinate";
$this->geoCoordinate->createObject();
$this->addType($this->geoCoordinate);

}
}