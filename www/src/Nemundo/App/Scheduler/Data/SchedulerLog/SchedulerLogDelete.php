<?php
namespace Nemundo\App\Scheduler\Data\SchedulerLog;
class SchedulerLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SchedulerLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerLogModel();
}
}