<?php
namespace Nemundo\Content\App\Map\Data\SwissMapContent;
class SwissMapContentBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var SwissMapContentModel
*/
protected $model;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinate;

public function __construct() {
parent::__construct();
$this->model = new SwissMapContentModel();
$this->geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
}
public function save() {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->geoCoordinate, $this->typeValueList);
$property->setValue($this->geoCoordinate);
$id = parent::save();
return $id;
}
}