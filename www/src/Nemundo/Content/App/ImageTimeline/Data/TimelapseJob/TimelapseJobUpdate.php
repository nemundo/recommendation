<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseJob;
use Nemundo\Model\Data\AbstractModelUpdate;
class TimelapseJobUpdate extends AbstractModelUpdate {
/**
* @var TimelapseJobModel
*/
public $model;

/**
* @var string
*/
public $imageTimelineId;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeTo;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeFrom;

public function __construct() {
parent::__construct();
$this->model = new TimelapseJobModel();
$this->dateTimeTo = new \Nemundo\Core\Type\DateTime\DateTime();
$this->dateTimeFrom = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function update() {
$this->typeValueList->setModelValue($this->model->imageTimelineId, $this->imageTimelineId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTimeTo, $this->typeValueList);
$property->setValue($this->dateTimeTo);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTimeFrom, $this->typeValueList);
$property->setValue($this->dateTimeFrom);
parent::update();
}
}