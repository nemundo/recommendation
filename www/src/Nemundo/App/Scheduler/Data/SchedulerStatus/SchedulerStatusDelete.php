<?php
namespace Nemundo\App\Scheduler\Data\SchedulerStatus;
class SchedulerStatusDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SchedulerStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerStatusModel();
}
}