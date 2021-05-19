<?php
namespace Nemundo\Content\App\Calendar\Data\Calendar;
class CalendarRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var CalendarModel
*/
public $model;

/**
* @var string
*/
public $id;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$value = $this->getModelValue($model->date);
if ($value !== "0000-00-00") {
$this->date = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->date));
}
$this->time = new \Nemundo\Core\Type\DateTime\Time($this->getModelValue($model->time));
$this->event = $this->getModelValue($model->event);
}
}