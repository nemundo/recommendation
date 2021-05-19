<?php
namespace Nemundo\App\Scheduler\Data\SchedulerLog;
class SchedulerLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SchedulerLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerLogModel();
}
/**
* @return SchedulerLogRow[]
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
* @return SchedulerLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SchedulerLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SchedulerLogRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}