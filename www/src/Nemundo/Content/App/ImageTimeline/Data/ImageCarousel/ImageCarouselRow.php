<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageCarousel;
class ImageCarouselRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ImageCarouselModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $imageTimelineId;

/**
* @var \Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineRow
*/
public $imageTimeline;

/**
* @var int
*/
public $imageCount;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->imageTimelineId = intval($this->getModelValue($model->imageTimelineId));
if ($model->imageTimeline !== null) {
$this->loadNemundoContentAppImageTimelineDataImageTimelineImageTimelineimageTimelineRow($model->imageTimeline);
}
$this->imageCount = intval($this->getModelValue($model->imageCount));
}
private function loadNemundoContentAppImageTimelineDataImageTimelineImageTimelineimageTimelineRow($model) {
$this->imageTimeline = new \Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineRow($this->row, $model);
}
}