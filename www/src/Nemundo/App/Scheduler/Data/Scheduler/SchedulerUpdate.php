<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
use Nemundo\Model\Data\AbstractModelUpdate;
class SchedulerUpdate extends AbstractModelUpdate {
/**
* @var SchedulerModel
*/
public $model;

/**
* @var string
*/
public $scriptId;

/**
* @var bool
*/
public $active;

/**
* @var bool
*/
public $overrideSetting;

/**
* @var bool
*/
public $running;

/**
* @var int
*/
public $day;

/**
* @var int
*/
public $hour;

/**
* @var int
*/
public $minute;

/**
* @var bool
*/
public $specificStartTime;

/**
* @var \Nemundo\Core\Type\DateTime\Time
*/
public $startTime;

/**
* @var bool
*/
public $setupStatus;

public function __construct() {
parent::__construct();
$this->model = new SchedulerModel();
$this->startTime = new \Nemundo\Core\Type\DateTime\Time();
}
public function update() {
$this->typeValueList->setModelValue($this->model->scriptId, $this->scriptId);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->overrideSetting, $this->overrideSetting);
$this->typeValueList->setModelValue($this->model->running, $this->running);
$this->typeValueList->setModelValue($this->model->day, $this->day);
$this->typeValueList->setModelValue($this->model->hour, $this->hour);
$this->typeValueList->setModelValue($this->model->minute, $this->minute);
$this->typeValueList->setModelValue($this->model->specificStartTime, $this->specificStartTime);
$property = new \Nemundo\Model\Data\Property\DateTime\TimeDataProperty($this->model->startTime, $this->typeValueList);
$property->setValue($this->startTime);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
parent::update();
}
}