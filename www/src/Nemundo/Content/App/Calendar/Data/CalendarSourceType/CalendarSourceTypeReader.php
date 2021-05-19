<?php
namespace Nemundo\Content\App\Calendar\Data\CalendarSourceType;
class CalendarSourceTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var CalendarSourceTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CalendarSourceTypeModel();
}
/**
* @return CalendarSourceTypeRow[]
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
* @return CalendarSourceTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return CalendarSourceTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new CalendarSourceTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}