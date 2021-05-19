<?php
namespace Nemundo\Content\Index\Geo\Data\GeoIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class GeoIndexUpdate extends AbstractModelUpdate {
/**
* @var GeoIndexModel
*/
public $model;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $coordinate;

/**
* @var string
*/
public $place;

/**
* @var string
*/
public $contentId;

public function __construct() {
parent::__construct();
$this->model = new GeoIndexModel();
$this->coordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
}
public function update() {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->coordinate, $this->typeValueList);
$property->setValue($this->coordinate);
$this->typeValueList->setModelValue($this->model->place, $this->place);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
parent::update();
}
}