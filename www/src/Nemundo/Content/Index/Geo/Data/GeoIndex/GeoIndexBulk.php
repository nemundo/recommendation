<?php
namespace Nemundo\Content\Index\Geo\Data\GeoIndex;
class GeoIndexBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var GeoIndexModel
*/
protected $model;

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
public function save() {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->coordinate, $this->typeValueList);
$property->setValue($this->coordinate);
$this->typeValueList->setModelValue($this->model->place, $this->place);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$id = parent::save();
return $id;
}
}