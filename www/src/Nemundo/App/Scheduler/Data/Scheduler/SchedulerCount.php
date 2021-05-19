<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
class SchedulerCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SchedulerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerModel();
}
}