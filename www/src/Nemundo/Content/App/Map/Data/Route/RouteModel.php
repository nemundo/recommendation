<?php
namespace Nemundo\Content\App\Map\Data\Route;
class RouteModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $route;

/**
* @var \Nemundo\Model\Type\File\FileType
*/
public $gpxFile;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $color;

protected function loadModel() {
$this->tableName = "map_route";
$this->aliasTableName = "map_route";
$this->label = "Route";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "map_route";
$this->id->externalTableName = "map_route";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "map_route_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->route = new \Nemundo\Model\Type\Text\TextType($this);
$this->route->tableName = "map_route";
$this->route->externalTableName = "map_route";
$this->route->fieldName = "route";
$this->route->aliasFieldName = "map_route_route";
$this->route->label = "Route";
$this->route->allowNullValue = true;
$this->route->length = 255;

$this->gpxFile = new \Nemundo\Model\Type\File\FileType($this);
$this->gpxFile->tableName = "map_route";
$this->gpxFile->externalTableName = "map_route";
$this->gpxFile->fieldName = "gpx_file";
$this->gpxFile->aliasFieldName = "map_route_gpx_file";
$this->gpxFile->label = "Gpx File";
$this->gpxFile->allowNullValue = true;

$this->color = new \Nemundo\Model\Type\Text\TextType($this);
$this->color->tableName = "map_route";
$this->color->externalTableName = "map_route";
$this->color->fieldName = "color";
$this->color->aliasFieldName = "map_route_color";
$this->color->label = "Color";
$this->color->allowNullValue = false;
$this->color->length = 20;

}
}