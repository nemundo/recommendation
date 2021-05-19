<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageCarousel;
class ImageCarouselDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ImageCarouselModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageCarouselModel();
}
}