<?php
namespace Nemundo\Content\App\ImageGallery\Data\ImageGallery;
class ImageGalleryPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new ImageGalleryRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}