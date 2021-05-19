<?php
namespace Nemundo\Content\App\Calendar\Data\Calendar;
class CalendarDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var CalendarModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CalendarModel();
}
}