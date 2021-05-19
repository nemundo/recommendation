<?php
namespace Nemundo\App\Scheduler\Data\SchedulerLog;
class SchedulerLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SchedulerLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $schedulerId;

/**
* @var \Nemundo\App\Scheduler\Data\Scheduler\SchedulerRow
*/
public $scheduler;

/**
* @var int
*/
public $schedulerStatusId;

/**
* @var \Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusRow
*/
public $schedulerStatus;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->schedulerId = intval($this->getModelValue($model->schedulerId));
if ($model->scheduler !== null) {
$this->loadNemundoAppSchedulerDataSchedulerSchedulerschedulerRow($model->scheduler);
}
$this->schedulerStatusId = intval($this->getModelValue($model->schedulerStatusId));
if ($model->schedulerStatus !== null) {
$this->loadNemundoAppSchedulerDataSchedulerStatusSchedulerStatusschedulerStatusRow($model->schedulerStatus);
}
$this->plannedDateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->plannedDateTime));
$this->duration = intval($this->getModelValue($model->duration));
$this->runningDateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->runningDateTime));
}
private function loadNemundoAppSchedulerDataSchedulerSchedulerschedulerRow($model) {
$this->scheduler = new \Nemundo\App\Scheduler\Data\Scheduler\SchedulerRow($this->row, $model);
}
private function loadNemundoAppSchedulerDataSchedulerStatusSchedulerStatusschedulerStatusRow($model) {
$this->schedulerStatus = new \Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusRow($this->row, $model);
}
}