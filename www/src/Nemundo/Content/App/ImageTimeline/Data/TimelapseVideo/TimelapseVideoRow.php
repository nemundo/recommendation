<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo;
class TimelapseVideoRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TimelapseVideoModel
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
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeFrom;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeTo;

/**
* @var \Nemundo\Model\Reader\Property\File\FileReaderProperty
*/
public $video;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->imageTimelineId = intval($this->getModelValue($model->imageTimelineId));
if ($model->imageTimeline !== null) {
$this->loadNemundoContentAppImageTimelineDataImageTimelineImageTimelineimageTimelineRow($model->imageTimeline);
}
$this->dateTimeFrom = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeFrom));
$this->dateTimeTo = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeTo));
$this->video = new \Nemundo\Model\Reader\Property\File\FileReaderProperty($row, $model->video);
}
private function loadNemundoContentAppImageTimelineDataImageTimelineImageTimelineimageTimelineRow($model) {
$this->imageTimeline = new \Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineRow($this->row, $model);
}
}