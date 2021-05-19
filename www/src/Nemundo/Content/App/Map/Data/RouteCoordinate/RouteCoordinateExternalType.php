<?php
namespace Nemundo\Content\App\Map\Data\RouteCoordinate;
class RouteCoordinateExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $routeId;

/**
* @var \Nemundo\Content\App\Map\Data\Route\RouteExternalType
*/
public $route;

/**
* @var \Nemundo\Model\Type\Geo\GeoCoordinateAltitudeType
*/
public $geoCoordinate;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = RouteCoordinateModel::class;
$this->externalTableName = "map_route_coordinate";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->routeId = new \Nemundo\Model\Type\Id\IdType();
$this->routeId->fieldName = "route";
$this->routeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->routeId->aliasFieldName = $this->routeId->tableName ."_".$this->routeId->fieldName;
$this->routeId->label = "Route";
$this->addType($this->routeId);

$this->geoCoordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateAltitudeType();
$this->geoCoordinate->fieldName = "geo_coordinate";
$this->geoCoordinate->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->geoCoordinate->externalTableName = $this->externalTableName;
$this->geoCoordinate->aliasFieldName = $this->geoCoordinate->tableName . "_" . $this->geoCoordinate->fieldName;
$this->geoCoordinate->label = "Geo Coordinate";
$this->geoCoordinate->createObject();
$this->addType($this->geoCoordinate);

}
public function loadRoute() {
if ($this->route == null) {
$this->route = new \Nemundo\Content\App\Map\Data\Route\RouteExternalType(null, $this->parentFieldName . "_route");
$this->route->fieldName = "route";
$this->route->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->route->aliasFieldName = $this->route->tableName ."_".$this->route->fieldName;
$this->route->label = "Route";
$this->addType($this->route);
}
return $this;
}
}