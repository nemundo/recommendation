<?php
namespace Nemundo\Content\App\Location\Data\Location;
class LocationBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var LocationModel
*/
protected $model;

/**
* @var string
*/
public $location;

/**
* @var string
*/
public $description;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinate;

public function __construct() {
parent::__construct();
$this->model = new LocationModel();
$this->geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
}
public function save() {
$this->typeValueList->setModelValue($this->model->location, $this->location);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->geoCoordinate, $this->typeValueList);
$property->setValue($this->geoCoordinate);
$id = parent::save();
return $id;
}
}