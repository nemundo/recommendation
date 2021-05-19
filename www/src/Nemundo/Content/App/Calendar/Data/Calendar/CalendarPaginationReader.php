<?php
namespace Nemundo\Content\App\Calendar\Data\Calendar;
class CalendarPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var CalendarModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CalendarModel();
}
/**
* @return CalendarRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new CalendarRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}