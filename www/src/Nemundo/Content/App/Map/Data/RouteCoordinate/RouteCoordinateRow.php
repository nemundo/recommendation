<?php
namespace Nemundo\Content\App\Map\Data\RouteCoordinate;
class RouteCoordinateRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var RouteCoordinateModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $routeId;

/**
* @var \Nemundo\Content\App\Map\Data\Route\RouteRow
*/
public $route;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinateAltitude
*/
public $geoCoordinate;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->routeId = intval($this->getModelValue($model->routeId));
if ($model->route !== null) {
$this->loadNemundoContentAppMapDataRouteRouterouteRow($model->route);
}
$property = new \Nemundo\Model\Reader\Property\Geo\GeoCoordinateAltitudeReaderProperty($row, $model->geoCoordinate);
$this->geoCoordinate = $property->getValue();
}
private function loadNemundoContentAppMapDataRouteRouterouteRow($model) {
$this->route = new \Nemundo\Content\App\Map\Data\Route\RouteRow($this->row, $model);
}
}