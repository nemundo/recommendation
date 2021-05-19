<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Image;
class ImageRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ImageModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $timelineId;

/**
* @var \Nemundo\Content\App\Timeline\Data\Timeline\TimelineRow
*/
public $timeline;

/**
* @var \Nemundo\Model\Reader\Property\File\ImageReaderProperty
*/
public $image;

/**
* @var string
*/
public $hash;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->timelineId = intval($this->getModelValue($model->timelineId));
if ($model->timeline !== null) {
$this->loadNemundoContentAppTimelineDataTimelineTimelinetimelineRow($model->timeline);
}
$this->image = new \Nemundo\Model\Reader\Property\File\ImageReaderProperty($row, $model->image);
$this->hash = $this->getModelValue($model->hash);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
}
private function loadNemundoContentAppTimelineDataTimelineTimelinetimelineRow($model) {
$this->timeline = new \Nemundo\Content\App\Timeline\Data\Timeline\TimelineRow($this->row, $model);
}
}