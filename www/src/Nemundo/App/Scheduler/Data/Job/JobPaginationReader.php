<?php
namespace Nemundo\App\Scheduler\Data\Job;
class JobPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new JobRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}