<?php
namespace Nemundo\App\Scheduler\Data\SchedulerStatus;
class SchedulerStatusReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SchedulerStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerStatusModel();
}
/**
* @return SchedulerStatusRow[]
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
* @return SchedulerStatusRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SchedulerStatusRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SchedulerStatusRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}