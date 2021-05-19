<?php
namespace Nemundo\Content\App\Map\Data\RouteCoordinate;
class RouteCoordinateDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var RouteCoordinateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RouteCoordinateModel();
}
}