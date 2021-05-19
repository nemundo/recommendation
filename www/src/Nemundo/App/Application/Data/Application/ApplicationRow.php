<?php
namespace Nemundo\App\Application\Data\Application;
class ApplicationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ApplicationModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $application;

/**
* @var bool
*/
public $setupStatus;

/**
* @var string
*/
public $applicationClass;

/**
* @var bool
*/
public $install;

/**
* @var int
*/
public $projectId;

/**
* @var \Nemundo\App\Application\Data\Project\ProjectRow
*/
public $project;

/**
* @var bool
*/
public $appMenu;

/**
* @var bool
*/
public $adminMenu;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->application = $this->getModelValue($model->application);
$this->setupStatus = boolval($this->getModelValue($model->setupStatus));
$this->applicationClass = $this->getModelValue($model->applicationClass);
$this->install = boolval($this->getModelValue($model->install));
$this->projectId = intval($this->getModelValue($model->projectId));
if ($model->project !== null) {
$this->loadNemundoAppApplicationDataProjectProjectprojectRow($model->project);
}
$this->appMenu = boolval($this->getModelValue($model->appMenu));
$this->adminMenu = boolval($this->getModelValue($model->adminMenu));
}
private function loadNemundoAppApplicationDataProjectProjectprojectRow($model) {
$this->project = new \Nemundo\App\Application\Data\Project\ProjectRow($this->row, $model);
}
}