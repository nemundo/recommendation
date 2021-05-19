<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageCarousel;
use Nemundo\Model\Id\AbstractModelIdValue;
class ImageCarouselId extends AbstractModelIdValue {
/**
* @var ImageCarouselModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageCarouselModel();
}
}