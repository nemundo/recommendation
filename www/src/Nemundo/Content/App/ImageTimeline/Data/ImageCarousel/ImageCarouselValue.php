<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageCarousel;
class ImageCarouselValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ImageCarouselModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageCarouselModel();
}
}