<?php
namespace Nemundo\Content\App\Map\Data\RouteCoordinate;
class RouteCoordinateModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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

protected function loadModel() {
$this->tableName = "map_route_coordinate";
$this->aliasTableName = "map_route_coordinate";
$this->label = "Route Coordinate";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "map_route_coordinate";
$this->id->externalTableName = "map_route_coordinate";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "map_route_coordinate_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->routeId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->routeId->tableName = "map_route_coordinate";
$this->routeId->fieldName = "route";
$this->routeId->aliasFieldName = "map_route_coordinate_route";
$this->routeId->label = "Route";
$this->routeId->allowNullValue = true;

$this->geoCoordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateAltitudeType($this);
$this->geoCoordinate->tableName = "map_route_coordinate";
$this->geoCoordinate->externalTableName = "map_route_coordinate";
$this->geoCoordinate->fieldName = "geo_coordinate";
$this->geoCoordinate->aliasFieldName = "map_route_coordinate_geo_coordinate";
$this->geoCoordinate->label = "Geo Coordinate";
$this->geoCoordinate->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "route";
$index->addType($this->routeId);

}
public function loadRoute() {
if ($this->route == null) {
$this->route = new \Nemundo\Content\App\Map\Data\Route\RouteExternalType($this, "map_route_coordinate_route");
$this->route->tableName = "map_route_coordinate";
$this->route->fieldName = "route";
$this->route->aliasFieldName = "map_route_coordinate_route";
$this->route->label = "Route";
}
return $this;
}
}