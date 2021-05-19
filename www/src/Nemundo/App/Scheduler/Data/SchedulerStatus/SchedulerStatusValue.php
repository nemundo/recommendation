<?php
namespace Nemundo\App\Scheduler\Data\SchedulerStatus;
class SchedulerStatusValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SchedulerStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerStatusModel();
}
}