<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
class SchedulerExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = SchedulerModel::class;
$this->externalTableName = "scheduler_scheduler";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->scriptId = new \Nemundo\Model\Type\Id\IdType();
$this->scriptId->fieldName = "script";
$this->scriptId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->scriptId->aliasFieldName = $this->scriptId->tableName ."_".$this->scriptId->fieldName;
$this->scriptId->label = "Script";
$this->addType($this->scriptId);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->externalTableName = $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

$this->overrideSetting = new \Nemundo\Model\Type\Number\YesNoType();
$this->overrideSetting->fieldName = "override_setting";
$this->overrideSetting->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->overrideSetting->externalTableName = $this->externalTableName;
$this->overrideSetting->aliasFieldName = $this->overrideSetting->tableName . "_" . $this->overrideSetting->fieldName;
$this->overrideSetting->label = "Override Setting";
$this->addType($this->overrideSetting);

$this->running = new \Nemundo\Model\Type\Number\YesNoType();
$this->running->fieldName = "running";
$this->running->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->running->externalTableName = $this->externalTableName;
$this->running->aliasFieldName = $this->running->tableName . "_" . $this->running->fieldName;
$this->running->label = "Running";
$this->addType($this->running);

$this->day = new \Nemundo\Model\Type\Number\NumberType();
$this->day->fieldName = "day";
$this->day->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->day->externalTableName = $this->externalTableName;
$this->day->aliasFieldName = $this->day->tableName . "_" . $this->day->fieldName;
$this->day->label = "Day";
$this->addType($this->day);

$this->hour = new \Nemundo\Model\Type\Number\NumberType();
$this->hour->fieldName = "hour";
$this->hour->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->hour->externalTableName = $this->externalTableName;
$this->hour->aliasFieldName = $this->hour->tableName . "_" . $this->hour->fieldName;
$this->hour->label = "Hour";
$this->addType($this->hour);

$this->minute = new \Nemundo\Model\Type\Number\NumberType();
$this->minute->fieldName = "minute";
$this->minute->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->minute->externalTableName = $this->externalTableName;
$this->minute->aliasFieldName = $this->minute->tableName . "_" . $this->minute->fieldName;
$this->minute->label = "Minute";
$this->addType($this->minute);

$this->specificStartTime = new \Nemundo\Model\Type\Number\YesNoType();
$this->specificStartTime->fieldName = "specific_start_time";
$this->specificStartTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->specificStartTime->externalTableName = $this->externalTableName;
$this->specificStartTime->aliasFieldName = $this->specificStartTime->tableName . "_" . $this->specificStartTime->fieldName;
$this->specificStartTime->label = "Specific Start Time";
$this->addType($this->specificStartTime);

$this->startTime = new \Nemundo\Model\Type\DateTime\TimeType();
$this->startTime->fieldName = "start_time";
$this->startTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->startTime->externalTableName = $this->externalTableName;
$this->startTime->aliasFieldName = $this->startTime->tableName . "_" . $this->startTime->fieldName;
$this->startTime->label = "Start Time";
$this->addType($this->startTime);

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType();
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->setupStatus->externalTableName = $this->externalTableName;
$this->setupStatus->aliasFieldName = $this->setupStatus->tableName . "_" . $this->setupStatus->fieldName;
$this->setupStatus->label = "Setup Status";
$this->addType($this->setupStatus);

}
public function loadScript() {
if ($this->script == null) {
$this->script = new \Nemundo\App\Script\Data\Script\ScriptExternalType(null, $this->parentFieldName . "_script");
$this->script->fieldName = "script";
$this->script->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->script->aliasFieldName = $this->script->tableName ."_".$this->script->fieldName;
$this->script->label = "Script";
$this->addType($this->script);
}
return $this;
}
}