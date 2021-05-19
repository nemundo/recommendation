<?php
namespace Nemundo\App\Scheduler\Data\Job;
class JobModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $finished;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $duration;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $statusId;

/**
* @var \Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusExternalType
*/
public $status;

protected function loadModel() {
$this->tableName = "scheduler_job";
$this->aliasTableName = "scheduler_job";
$this->label = "Job";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "scheduler_job";
$this->id->externalTableName = "scheduler_job";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "scheduler_job_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->scriptId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->scriptId->tableName = "scheduler_job";
$this->scriptId->fieldName = "script";
$this->scriptId->aliasFieldName = "scheduler_job_script";
$this->scriptId->label = "Script";
$this->scriptId->allowNullValue = false;

$this->finished = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->finished->tableName = "scheduler_job";
$this->finished->externalTableName = "scheduler_job";
$this->finished->fieldName = "finished";
$this->finished->aliasFieldName = "scheduler_job_finished";
$this->finished->label = "Finished";
$this->finished->allowNullValue = false;

$this->duration = new \Nemundo\Model\Type\Number\NumberType($this);
$this->duration->tableName = "scheduler_job";
$this->duration->externalTableName = "scheduler_job";
$this->duration->fieldName = "duration";
$this->duration->aliasFieldName = "scheduler_job_duration";
$this->duration->label = "Duration";
$this->duration->allowNullValue = true;

$this->statusId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->statusId->tableName = "scheduler_job";
$this->statusId->fieldName = "status";
$this->statusId->aliasFieldName = "scheduler_job_status";
$this->statusId->label = "Status";
$this->statusId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "finished";
$index->addType($this->finished);

}
public function loadScript() {
if ($this->script == null) {
$this->script = new \Nemundo\App\Script\Data\Script\ScriptExternalType($this, "scheduler_job_script");
$this->script->tableName = "scheduler_job";
$this->script->fieldName = "script";
$this->script->aliasFieldName = "scheduler_job_script";
$this->script->label = "Script";
}
return $this;
}
public function loadStatus() {
if ($this->status == null) {
$this->status = new \Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusExternalType($this, "scheduler_job_status");
$this->status->tableName = "scheduler_job";
$this->status->fieldName = "status";
$this->status->aliasFieldName = "scheduler_job_status";
$this->status->label = "Status";
}
return $this;
}
}