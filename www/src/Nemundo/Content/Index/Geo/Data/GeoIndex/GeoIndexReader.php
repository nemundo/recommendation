<?php
namespace Nemundo\Content\Index\Geo\Data\GeoIndex;
class GeoIndexReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var GeoIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoIndexModel();
}
/**
* @return GeoIndexRow[]
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
* @return GeoIndexRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return GeoIndexRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new GeoIndexRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}