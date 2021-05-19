<?php
namespace Nemundo\Content\App\Calendar\Data\CalendarSourceType;
class CalendarSourceTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var CalendarSourceTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CalendarSourceTypeModel();
}
}