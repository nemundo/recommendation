<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageCarousel;
class ImageCarouselCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ImageCarouselModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageCarouselModel();
}
}