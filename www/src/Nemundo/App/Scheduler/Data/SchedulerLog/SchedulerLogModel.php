<?php
namespace Nemundo\App\Scheduler\Data\SchedulerLog;
class SchedulerLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $schedulerId;

/**
* @var \Nemundo\App\Scheduler\Data\Scheduler\SchedulerExternalType
*/
public $scheduler;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $schedulerStatusId;

/**
* @var \Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusExternalType
*/
public $schedulerStatus;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $plannedDateTime;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $duration;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $runningDateTime;

protected function loadModel() {
$this->tableName = "scheduler_log";
$this->aliasTableName = "scheduler_log";
$this->label = "Scheduler Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "scheduler_log";
$this->id->externalTableName = "scheduler_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "scheduler_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->schedulerId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->schedulerId->tableName = "scheduler_log";
$this->schedulerId->fieldName = "scheduler";
$this->schedulerId->aliasFieldName = "scheduler_log_scheduler";
$this->schedulerId->label = "Scheduler";
$this->schedulerId->allowNullValue = false;

$this->schedulerStatusId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->schedulerStatusId->tableName = "scheduler_log";
$this->schedulerStatusId->fieldName = "scheduler_status";
$this->schedulerStatusId->aliasFieldName = "scheduler_log_scheduler_status";
$this->schedulerStatusId->label = "Scheduler Status";
$this->schedulerStatusId->allowNullValue = false;

$this->plannedDateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->plannedDateTime->tableName = "scheduler_log";
$this->plannedDateTime->externalTableName = "scheduler_log";
$this->plannedDateTime->fieldName = "planned_date_time";
$this->plannedDateTime->aliasFieldName = "scheduler_log_planned_date_time";
$this->plannedDateTime->label = "Planned Date Time";
$this->plannedDateTime->allowNullValue = false;

$this->duration = new \Nemundo\Model\Type\Number\NumberType($this);
$this->duration->tableName = "scheduler_log";
$this->duration->externalTableName = "scheduler_log";
$this->duration->fieldName = "duration";
$this->duration->aliasFieldName = "scheduler_log_duration";
$this->duration->label = "Duration";
$this->duration->allowNullValue = true;

$this->runningDateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->runningDateTime->tableName = "scheduler_log";
$this->runningDateTime->externalTableName = "scheduler_log";
$this->runningDateTime->fieldName = "running_date_time";
$this->runningDateTime->aliasFieldName = "scheduler_log_running_date_time";
$this->runningDateTime->label = "Running Date Time";
$this->runningDateTime->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "scheduler_status";
$index->addType($this->schedulerId);
$index->addType($this->schedulerStatusId);

}
public function loadScheduler() {
if ($this->scheduler == null) {
$this->scheduler = new \Nemundo\App\Scheduler\Data\Scheduler\SchedulerExternalType($this, "scheduler_log_scheduler");
$this->scheduler->tableName = "scheduler_log";
$this->scheduler->fieldName = "scheduler";
$this->scheduler->aliasFieldName = "scheduler_log_scheduler";
$this->scheduler->label = "Scheduler";
}
return $this;
}
public function loadSchedulerStatus() {
if ($this->schedulerStatus == null) {
$this->schedulerStatus = new \Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusExternalType($this, "scheduler_log_scheduler_status");
$this->schedulerStatus->tableName = "scheduler_log";
$this->schedulerStatus->fieldName = "scheduler_status";
$this->schedulerStatus->aliasFieldName = "scheduler_log_scheduler_status";
$this->schedulerStatus->label = "Scheduler Status";
}
return $this;
}
}