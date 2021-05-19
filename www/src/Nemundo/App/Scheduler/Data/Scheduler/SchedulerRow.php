<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
class SchedulerRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SchedulerModel
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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->scriptId = intval($this->getModelValue($model->scriptId));
if ($model->script !== null) {
$this->loadNemundoAppScriptDataScriptScriptscriptRow($model->script);
}
$this->active = boolval($this->getModelValue($model->active));
$this->overrideSetting = boolval($this->getModelValue($model->overrideSetting));
$this->running = boolval($this->getModelValue($model->running));
$this->day = intval($this->getModelValue($model->day));
$this->hour = intval($this->getModelValue($model->hour));
$this->minute = intval($this->getModelValue($model->minute));
$this->specificStartTime = boolval($this->getModelValue($model->specificStartTime));
$this->startTime = new \Nemundo\Core\Type\DateTime\Time($this->getModelValue($model->startTime));
$this->setupStatus = boolval($this->getModelValue($model->setupStatus));
}
private function loadNemundoAppScriptDataScriptScriptscriptRow($model) {
$this->script = new \Nemundo\App\Script\Row\ScriptCustomRow($this->row, $model);
}
}