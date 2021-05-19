<?php
namespace Nemundo\Content\App\ImageGallery\Data\Image;
class ImagePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageModel();
}
/**
* @return ImageRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ImageRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}