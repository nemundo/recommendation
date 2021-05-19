<?php
namespace Nemundo\Content\App\Map\Data\RouteCoordinate;
class RouteCoordinateReader extends \Nemundo\Model\Reader\ModelDataReader {
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
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return RouteCoordinateRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return RouteCoordinateRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new RouteCoordinateRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}