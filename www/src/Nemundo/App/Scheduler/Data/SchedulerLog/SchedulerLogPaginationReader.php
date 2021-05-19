<?php
namespace Nemundo\App\Scheduler\Data\SchedulerLog;
class SchedulerLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new SchedulerLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}