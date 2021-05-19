<?php
namespace Nemundo\App\Scheduler\Data\SchedulerStatus;
class SchedulerStatusCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SchedulerStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerStatusModel();
}
}