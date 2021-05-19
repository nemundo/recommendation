<?php
namespace Nemundo\Content\App\Map\Data\RouteCoordinate;
class RouteCoordinateCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var RouteCoordinateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RouteCoordinateModel();
}
}