<?php
namespace Nemundo\App\Script\Data\Script;
class ScriptRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ScriptModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $scriptName;

/**
* @var string
*/
public $scriptClass;

/**
* @var string
*/
public $description;

/**
* @var string
*/
public $applicationId;

/**
* @var \Nemundo\App\Application\Row\ApplicationCustomRow
*/
public $application;

/**
* @var bool
*/
public $consoleScript;

/**
* @var bool
*/
public $setupStatus;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->scriptName = $this->getModelValue($model->scriptName);
$this->scriptClass = $this->getModelValue($model->scriptClass);
$this->description = $this->getModelValue($model->description);
$this->applicationId = $this->getModelValue($model->applicationId);
if ($model->application !== null) {
$this->loadNemundoAppApplicationDataApplicationApplicationapplicationRow($model->application);
}
$this->consoleScript = boolval($this->getModelValue($model->consoleScript));
$this->setupStatus = boolval($this->getModelValue($model->setupStatus));
}
private function loadNemundoAppApplicationDataApplicationApplicationapplicationRow($model) {
$this->application = new \Nemundo\App\Application\Row\ApplicationCustomRow($this->row, $model);
}
}