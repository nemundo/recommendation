<?php
namespace Nemundo\App\Scheduler\Data\SchedulerStatus;
use Nemundo\Model\Data\AbstractModelUpdate;
class SchedulerStatusUpdate extends AbstractModelUpdate {
/**
* @var SchedulerStatusModel
*/
public $model;

/**
* @var string
*/
public $schedulerStatus;

public function __construct() {
parent::__construct();
$this->model = new SchedulerStatusModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->schedulerStatus, $this->schedulerStatus);
parent::update();
}
}