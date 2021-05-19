<?php
namespace Nemundo\App\Scheduler\Data\SchedulerLog;
class SchedulerLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SchedulerLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerLogModel();
}
}