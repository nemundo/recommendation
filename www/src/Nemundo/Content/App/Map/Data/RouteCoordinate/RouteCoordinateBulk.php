<?php
namespace Nemundo\Content\App\Map\Data\RouteCoordinate;
class RouteCoordinateBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var RouteCoordinateModel
*/
protected $model;

/**
* @var string
*/
public $routeId;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinateAltitude
*/
public $geoCoordinate;

public function __construct() {
parent::__construct();
$this->model = new RouteCoordinateModel();
$this->geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinateAltitude();
}
public function save() {
$this->typeValueList->setModelValue($this->model->routeId, $this->routeId);
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateAltitudeDataProperty($this->model->geoCoordinate, $this->typeValueList);
$property->setValue($this->geoCoordinate);
$id = parent::save();
return $id;
}
}