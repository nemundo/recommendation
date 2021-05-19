<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageCarousel;
class ImageCarouselBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ImageCarouselModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->imageTimelineId, $this->imageTimelineId);
$this->typeValueList->setModelValue($this->model->imageCount, $this->imageCount);
$id = parent::save();
return $id;
}
}