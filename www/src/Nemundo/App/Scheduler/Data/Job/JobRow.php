<?php
namespace Nemundo\App\Scheduler\Data\Job;
class JobRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var JobModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $scriptId;

/**
* @var \Nemundo\App\Script\Row\ScriptCustomRow
*/
public $script;

/**
* @var bool
*/
public $finished;

/**
* @var int
*/
public $duration;

/**
* @var int
*/
public $statusId;

/**
* @var \Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusRow
*/
public $status;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->scriptId = intval($this->getModelValue($model->scriptId));
if ($model->script !== null) {
$this->loadNemundoAppScriptDataScriptScriptscriptRow($model->script);
}
$this->finished = boolval($this->getModelValue($model->finished));
$this->duration = intval($this->getModelValue($model->duration));
$this->statusId = intval($this->getModelValue($model->statusId));
if ($model->status !== null) {
$this->loadNemundoAppSchedulerDataSchedulerStatusSchedulerStatusstatusRow($model->status);
}
}
private function loadNemundoAppScriptDataScriptScriptscriptRow($model) {
$this->script = new \Nemundo\App\Script\Row\ScriptCustomRow($this->row, $model);
}
private function loadNemundoAppSchedulerDataSchedulerStatusSchedulerStatusstatusRow($model) {
$this->status = new \Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusRow($this->row, $model);
}
}