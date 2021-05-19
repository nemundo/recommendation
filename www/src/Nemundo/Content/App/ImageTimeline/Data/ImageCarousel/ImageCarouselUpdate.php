<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageCarousel;
use Nemundo\Model\Data\AbstractModelUpdate;
class ImageCarouselUpdate extends AbstractModelUpdate {
/**
* @var ImageCarouselModel
*/
public $model;

/**
* @var string
*/
public $imageTimelineId;

/**
* @var int
*/
public $imageCount;

public function __construct() {
parent::__construct();
$this->model = new ImageCarouselModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->imageTimelineId, $this->imageTimelineId);
$this->typeValueList->setModelValue($this->model->imageCount, $this->imageCount);
parent::update();
}
}