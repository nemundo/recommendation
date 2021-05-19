<?php
namespace Nemundo\Content\App\Timeline\Data\Timeline;
class Timeline extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TimelineModel
*/
protected $model;

/**
* @var string
*/
public $contentId;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $date;

/**
* @var string
*/
public $subject;

public function __construct() {
parent::__construct();
$this->model = new TimelineModel();
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
$this->date = new \Nemundo\Core\Type\DateTime\Date();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->date, $this->typeValueList);
$property->setValue($this->date);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$id = parent::save();
return $id;
}
}