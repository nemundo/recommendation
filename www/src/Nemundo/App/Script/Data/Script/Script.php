<?php
namespace Nemundo\App\Script\Data\Script;
class Script extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ScriptModel
*/
protected $model;

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
* @var bool
*/
public $consoleScript;

/**
* @var bool
*/
public $setupStatus;

public function __construct() {
parent::__construct();
$this->model = new ScriptModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->scriptName, $this->scriptName);
$this->typeValueList->setModelValue($this->model->scriptClass, $this->scriptClass);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->applicationId, $this->applicationId);
$this->typeValueList->setModelValue($this->model->consoleScript, $this->consoleScript);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
$id = parent::save();
return $id;
}
}