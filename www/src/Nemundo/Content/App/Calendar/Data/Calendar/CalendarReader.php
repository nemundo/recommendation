<?php
namespace Nemundo\Content\App\Calendar\Data\Calendar;
class CalendarReader extends \Nemundo\Model\Reader\ModelDataReader {
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
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return CalendarRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return CalendarRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new CalendarRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}