<?php
namespace Nemundo\Content\App\Map\Data\RouteCoordinate;
class RouteCoordinateValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var RouteCoordinateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RouteCoordinateModel();
}
}