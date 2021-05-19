<?php
namespace Nemundo\Content\App\Job\Data\Job;
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
* @return \Nemundo\Content\App\Job\Row\JobCustomRow[]
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
* @return \Nemundo\Content\App\Job\Row\JobCustomRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \Nemundo\Content\App\Job\Row\JobCustomRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \Nemundo\Content\App\Job\Row\JobCustomRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}