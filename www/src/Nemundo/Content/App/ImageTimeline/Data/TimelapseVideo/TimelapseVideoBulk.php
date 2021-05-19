<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo;
class TimelapseVideoBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var TimelapseVideoModel
*/
protected $model;

/**
* @var string
*/
public $imageTimelineId;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeFrom;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeTo;

/**
* @var \Nemundo\Model\Data\Property\File\FileDataProperty
*/
public $video;

public function __construct() {
parent::__construct();
$this->model = new TimelapseVideoModel();
$this->dateTimeFrom = new \Nemundo\Core\Type\DateTime\DateTime();
$this->dateTimeTo = new \Nemundo\Core\Type\DateTime\DateTime();
$this->video = new \Nemundo\Model\Data\Property\File\FileDataProperty($this->model->video, $this->typeValueList);
}
public function save() {
$this->typeValueList->setModelValue($this->model->imageTimelineId, $this->imageTimelineId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTimeFrom, $this->typeValueList);
$property->setValue($this->dateTimeFrom);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTimeTo, $this->typeValueList);
$property->setValue($this->dateTimeTo);
$id = parent::save();
return $id;
}
}