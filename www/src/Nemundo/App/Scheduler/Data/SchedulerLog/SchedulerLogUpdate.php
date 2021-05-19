<?php
namespace Nemundo\App\Scheduler\Data\SchedulerLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class SchedulerLogUpdate extends AbstractModelUpdate {
/**
* @var SchedulerLogModel
*/
public $model;

/**
* @var string
*/
public $schedulerId;

/**
* @var string
*/
public $schedulerStatusId;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $plannedDateTime;

/**
* @var int
*/
public $duration;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $runningDateTime;

public function __construct() {
parent::__construct();
$this->model = new SchedulerLogModel();
$this->plannedDateTime = new \Nemundo\Core\Type\DateTime\DateTime();
$this->runningDateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function update() {
$this->typeValueList->setModelValue($this->model->schedulerId, $this->schedulerId);
$this->typeValueList->setModelValue($this->model->schedulerStatusId, $this->schedulerStatusId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->plannedDateTime, $this->typeValueList);
$property->setValue($this->plannedDateTime);
$this->typeValueList->setModelValue($this->model->duration, $this->duration);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->runningDateTime, $this->typeValueList);
$property->setValue($this->runningDateTime);
parent::update();
}
}