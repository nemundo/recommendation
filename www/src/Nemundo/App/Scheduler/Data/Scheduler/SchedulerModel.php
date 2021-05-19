<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
class SchedulerModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $scriptId;

/**
* @var \Nemundo\App\Script\Data\Script\ScriptExternalType
*/
public $script;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $overrideSetting;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $running;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $day;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $hour;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $minute;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $specificStartTime;

/**
* @var \Nemundo\Model\Type\DateTime\TimeType
*/
public $startTime;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

protected function loadModel() {
$this->tableName = "scheduler_scheduler";
$this->aliasTableName = "scheduler_scheduler";
$this->label = "Scheduler";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "scheduler_scheduler";
$this->id->externalTableName = "scheduler_scheduler";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "scheduler_scheduler_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->scriptId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->scriptId->tableName = "scheduler_scheduler";
$this->scriptId->fieldName = "script";
$this->scriptId->aliasFieldName = "scheduler_scheduler_script";
$this->scriptId->label = "Script";
$this->scriptId->allowNullValue = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "scheduler_scheduler";
$this->active->externalTableName = "scheduler_scheduler";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "scheduler_scheduler_active";
$this->active->label = "Active";
$this->active->allowNullValue = true;

$this->overrideSetting = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->overrideSetting->tableName = "scheduler_scheduler";
$this->overrideSetting->externalTableName = "scheduler_scheduler";
$this->overrideSetting->fieldName = "override_setting";
$this->overrideSetting->aliasFieldName = "scheduler_scheduler_override_setting";
$this->overrideSetting->label = "Override Setting";
$this->overrideSetting->allowNullValue = false;

$this->running = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->running->tableName = "scheduler_scheduler";
$this->running->externalTableName = "scheduler_scheduler";
$this->running->fieldName = "running";
$this->running->aliasFieldName = "scheduler_scheduler_running";
$this->running->label = "Running";
$this->running->allowNullValue = true;

$this->day = new \Nemundo\Model\Type\Number\NumberType($this);
$this->day->tableName = "scheduler_scheduler";
$this->day->externalTableName = "scheduler_scheduler";
$this->day->fieldName = "day";
$this->day->aliasFieldName = "scheduler_scheduler_day";
$this->day->label = "Day";
$this->day->allowNullValue = true;

$this->hour = new \Nemundo\Model\Type\Number\NumberType($this);
$this->hour->tableName = "scheduler_scheduler";
$this->hour->externalTableName = "scheduler_scheduler";
$this->hour->fieldName = "hour";
$this->hour->aliasFieldName = "scheduler_scheduler_hour";
$this->hour->label = "Hour";
$this->hour->allowNullValue = true;

$this->minute = new \Nemundo\Model\Type\Number\NumberType($this);
$this->minute->tableName = "scheduler_scheduler";
$this->minute->externalTableName = "scheduler_scheduler";
$this->minute->fieldName = "minute";
$this->minute->aliasFieldName = "scheduler_scheduler_minute";
$this->minute->label = "Minute";
$this->minute->allowNullValue = true;

$this->specificStartTime = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->specificStartTime->tableName = "scheduler_scheduler";
$this->specificStartTime->externalTableName = "scheduler_scheduler";
$this->specificStartTime->fieldName = "specific_start_time";
$this->specificStartTime->aliasFieldName = "scheduler_scheduler_specific_start_time";
$this->specificStartTime->label = "Specific Start Time";
$this->specificStartTime->allowNullValue = true;

$this->startTime = new \Nemundo\Model\Type\DateTime\TimeType($this);
$this->startTime->tableName = "scheduler_scheduler";
$this->startTime->externalTableName = "scheduler_scheduler";
$this->startTime->fieldName = "start_time";
$this->startTime->aliasFieldName = "scheduler_scheduler_start_time";
$this->startTime->label = "Start Time";
$this->startTime->allowNullValue = true;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "scheduler_scheduler";
$this->setupStatus->externalTableName = "scheduler_scheduler";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "scheduler_scheduler_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "script";
$index->addType($this->scriptId);

}
public function loadScript() {
if ($this->script == null) {
$this->script = new \Nemundo\App\Script\Data\Script\ScriptExternalType($this, "scheduler_scheduler_script");
$this->script->tableName = "scheduler_scheduler";
$this->script->fieldName = "script";
$this->script->aliasFieldName = "scheduler_scheduler_script";
$this->script->label = "Script";
}
return $this;
}
}