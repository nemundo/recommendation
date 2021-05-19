<?php
namespace Nemundo\Content\App\Webcam\Data\WebcamImage;
class WebcamImageReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WebcamImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamImageModel();
}
/**
* @return WebcamImageRow[]
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
* @return WebcamImageRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WebcamImageRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WebcamImageRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}