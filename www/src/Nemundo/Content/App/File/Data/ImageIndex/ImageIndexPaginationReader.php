<?php
namespace Nemundo\Content\App\File\Data\ImageIndex;
class ImageIndexPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new ImageIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}