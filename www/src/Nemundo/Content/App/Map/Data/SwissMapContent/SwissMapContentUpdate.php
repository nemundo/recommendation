<?php
namespace Nemundo\Content\App\Map\Data\SwissMapContent;
use Nemundo\Model\Data\AbstractModelUpdate;
class SwissMapContentUpdate extends AbstractModelUpdate {
/**
* @var SwissMapContentModel
*/
public $model;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinate;

public function __construct() {
parent::__construct();
$this->model = new SwissMapContentModel();
$this->geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
}
public function update() {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->geoCoordinate, $this->typeValueList);
$property->setValue($this->geoCoordinate);
parent::update();
}
}