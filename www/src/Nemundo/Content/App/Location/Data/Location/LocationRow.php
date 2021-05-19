<?php
namespace Nemundo\Content\App\Location\Data\Location;
class LocationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LocationModel
*/
public $model;

/**
* @var string
*/
public $id;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->location = $this->getModelValue($model->location);
$this->description = $this->getModelValue($model->description);
$property = new \Nemundo\Model\Reader\Property\Geo\GeoCoordinateReaderProperty($row, $model->geoCoordinate);
$this->geoCoordinate = $property->getValue();
}
}