<?php
namespace Nemundo\Content\App\Calendar\Data\Calendar;
use Nemundo\Model\Id\AbstractModelIdValue;
class CalendarId extends AbstractModelIdValue {
/**
* @var CalendarModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CalendarModel();
}
}