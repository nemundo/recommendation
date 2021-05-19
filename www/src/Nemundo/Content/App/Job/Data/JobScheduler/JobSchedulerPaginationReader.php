<?php
namespace Nemundo\Content\App\Job\Data\JobScheduler;
class JobSchedulerPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var JobSchedulerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JobSchedulerModel();
}
/**
* @return JobSchedulerRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new JobSchedulerRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}