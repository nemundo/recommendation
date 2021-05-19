<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageCarousel;
class ImageCarouselPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ImageCarouselModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageCarouselModel();
}
/**
* @return ImageCarouselRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ImageCarouselRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}