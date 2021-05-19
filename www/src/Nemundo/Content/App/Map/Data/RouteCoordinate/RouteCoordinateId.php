<?php
namespace Nemundo\Content\App\Map\Data\RouteCoordinate;
use Nemundo\Model\Id\AbstractModelIdValue;
class RouteCoordinateId extends AbstractModelIdValue {
/**
* @var RouteCoordinateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RouteCoordinateModel();
}
}