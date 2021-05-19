<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
class SchedulerValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SchedulerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerModel();
}
}