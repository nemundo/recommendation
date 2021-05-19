<?php
namespace Nemundo\Content\App\Map\Data\Route;
class RouteReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var RouteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RouteModel();
}
/**
* @return RouteRow[]
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
* @return RouteRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return RouteRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new RouteRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}