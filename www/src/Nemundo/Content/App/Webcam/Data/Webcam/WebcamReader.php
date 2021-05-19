<?php
namespace Nemundo\Content\App\Webcam\Data\Webcam;
class WebcamReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WebcamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamModel();
}
/**
* @return \Nemundo\Content\App\Webcam\Row\WebcamCustomRow[]
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
* @return \Nemundo\Content\App\Webcam\Row\WebcamCustomRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \Nemundo\Content\App\Webcam\Row\WebcamCustomRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \Nemundo\Content\App\Webcam\Row\WebcamCustomRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}