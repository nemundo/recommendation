<?php
namespace Nemundo\Content\App\File\Data\ImageIndex;
class ImageIndexReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ImageIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageIndexModel();
}
/**
* @return ImageIndexRow[]
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
* @return ImageIndexRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ImageIndexRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ImageIndexRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}