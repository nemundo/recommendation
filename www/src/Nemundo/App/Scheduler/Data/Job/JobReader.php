<?php
namespace Nemundo\App\Scheduler\Data\Job;
class JobReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var JobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JobModel();
}
/**
* @return JobRow[]
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
* @return JobRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return JobRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new JobRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}