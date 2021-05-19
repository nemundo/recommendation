<?php
namespace Nemundo\App\Scheduler\Data\SchedulerLog;
class SchedulerLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $schedulerId;

/**
* @var \Nemundo\App\Scheduler\Data\Scheduler\SchedulerExternalType
*/
public $scheduler;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = SchedulerLogModel::class;
$this->externalTableName = "scheduler_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->schedulerId = new \Nemundo\Model\Type\Id\IdType();
$this->schedulerId->fieldName = "scheduler";
$this->schedulerId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->schedulerId->aliasFieldName = $this->schedulerId->tableName ."_".$this->schedulerId->fieldName;
$this->schedulerId->label = "Scheduler";
$this->addType($this->schedulerId);

$this->schedulerStatusId = new \Nemundo\Model\Type\Id\IdType();
$this->schedulerStatusId->fieldName = "scheduler_status";
$this->schedulerStatusId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->schedulerStatusId->aliasFieldName = $this->schedulerStatusId->tableName ."_".$this->schedulerStatusId->fieldName;
$this->schedulerStatusId->label = "Scheduler Status";
$this->addType($this->schedulerStatusId);

$this->plannedDateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->plannedDateTime->fieldName = "planned_date_time";
$this->plannedDateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->plannedDateTime->externalTableName = $this->externalTableName;
$this->plannedDateTime->aliasFieldName = $this->plannedDateTime->tableName . "_" . $this->plannedDateTime->fieldName;
$this->plannedDateTime->label = "Planned Date Time";
$this->addType($this->plannedDateTime);

$this->duration = new \Nemundo\Model\Type\Number\NumberType();
$this->duration->fieldName = "duration";
$this->duration->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->duration->externalTableName = $this->externalTableName;
$this->duration->aliasFieldName = $this->duration->tableName . "_" . $this->duration->fieldName;
$this->duration->label = "Duration";
$this->addType($this->duration);

$this->runningDateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->runningDateTime->fieldName = "running_date_time";
$this->runningDateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->runningDateTime->externalTableName = $this->externalTableName;
$this->runningDateTime->aliasFieldName = $this->runningDateTime->tableName . "_" . $this->runningDateTime->fieldName;
$this->runningDateTime->label = "Running Date Time";
$this->addType($this->runningDateTime);

}
public function loadScheduler() {
if ($this->scheduler == null) {
$this->scheduler = new \Nemundo\App\Scheduler\Data\Scheduler\SchedulerExternalType(null, $this->parentFieldName . "_scheduler");
$this->scheduler->fieldName = "scheduler";
$this->scheduler->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->scheduler->aliasFieldName = $this->scheduler->tableName ."_".$this->scheduler->fieldName;
$this->scheduler->label = "Scheduler";
$this->addType($this->scheduler);
}
return $this;
}
public function loadSchedulerStatus() {
if ($this->schedulerStatus == null) {
$this->schedulerStatus = new \Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusExternalType(null, $this->parentFieldName . "_scheduler_status");
$this->schedulerStatus->fieldName = "scheduler_status";
$this->schedulerStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->schedulerStatus->aliasFieldName = $this->schedulerStatus->tableName ."_".$this->schedulerStatus->fieldName;
$this->schedulerStatus->label = "Scheduler Status";
$this->addType($this->schedulerStatus);
}
return $this;
}
}