<?php
namespace Nemundo\Content\App\Calendar\Data\Calendar;
class Calendar extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var CalendarModel
*/
protected $model;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $date;

/**
* @var \Nemundo\Core\Type\DateTime\Time
*/
public $time;

/**
* @var string
*/
public $event;

public function __construct() {
parent::__construct();
$this->model = new CalendarModel();
$this->date = new \Nemundo\Core\Type\DateTime\Date();
$this->time = new \Nemundo\Core\Type\DateTime\Time();
}
public function save() {
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->date, $this->typeValueList);
$property->setValue($this->date);
$property = new \Nemundo\Model\Data\Property\DateTime\TimeDataProperty($this->model->time, $this->typeValueList);
$property->setValue($this->time);
$this->typeValueList->setModelValue($this->model->event, $this->event);
$id = parent::save();
return $id;
}
}