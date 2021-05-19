<?php
namespace Nemundo\Content\App\Timeline\Data\Timeline;
class TimelineReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TimelineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelineModel();
}
/**
* @return TimelineRow[]
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
* @return TimelineRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TimelineRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TimelineRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}