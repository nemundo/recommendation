<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
class SchedulerDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SchedulerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerModel();
}
}