<?php
namespace Nemundo\App\Scheduler\Data\SchedulerLog;
class SchedulerLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SchedulerLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerLogModel();
}
}