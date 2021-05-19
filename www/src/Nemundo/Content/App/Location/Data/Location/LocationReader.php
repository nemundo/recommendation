<?php
namespace Nemundo\Content\App\Location\Data\Location;
class LocationReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LocationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LocationModel();
}
/**
* @return LocationRow[]
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
* @return LocationRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return LocationRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new LocationRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}