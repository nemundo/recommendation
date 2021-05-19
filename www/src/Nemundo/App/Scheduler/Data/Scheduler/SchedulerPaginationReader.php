<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
class SchedulerPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var SchedulerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerModel();
}
/**
* @return SchedulerRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SchedulerRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}