<?php
namespace Nemundo\Content\App\Camera\Data\Camera;
class CameraReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var CameraModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CameraModel();
}
/**
* @return CameraRow[]
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
* @return CameraRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return CameraRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new CameraRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}