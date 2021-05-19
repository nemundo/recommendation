<?php
namespace Nemundo\Content\App\ImageGallery\Data\ImageGallery;
class ImageGalleryReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ImageGalleryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageGalleryModel();
}
/**
* @return ImageGalleryRow[]
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
* @return ImageGalleryRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ImageGalleryRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ImageGalleryRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}