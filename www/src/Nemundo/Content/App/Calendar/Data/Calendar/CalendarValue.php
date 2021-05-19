<?php
namespace Nemundo\Content\App\Calendar\Data\Calendar;
class CalendarValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var CalendarModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CalendarModel();
}
}