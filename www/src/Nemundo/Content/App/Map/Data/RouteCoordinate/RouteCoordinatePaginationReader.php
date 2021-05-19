<?php
namespace Nemundo\Content\App\Map\Data\RouteCoordinate;
class RouteCoordinatePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var RouteCoordinateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RouteCoordinateModel();
}
/**
* @return RouteCoordinateRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new RouteCoordinateRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}