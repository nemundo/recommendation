<?php
namespace Nemundo\App\Scheduler\Data\SchedulerStatus;
class SchedulerStatusPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new SchedulerStatusRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}