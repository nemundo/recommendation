<?php
namespace Nemundo\Content\App\Calendar\Data\Calendar;
class CalendarCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var CalendarModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CalendarModel();
}
}