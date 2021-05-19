<?php
namespace Nemundo\Content\App\Project\Data\ProjectPhase;
class ProjectPhaseRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ProjectPhaseModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $projectId;

/**
* @var \Nemundo\Content\App\Project\Data\Project\ProjectRow
*/
public $project;

/**
* @var string
*/
public $projectPhase;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->projectId = intval($this->getModelValue($model->projectId));
if ($model->project !== null) {
$this->loadNemundoContentAppProjectDataProjectProjectprojectRow($model->project);
}
$this->projectPhase = $this->getModelValue($model->projectPhase);
}
private function loadNemundoContentAppProjectDataProjectProjectprojectRow($model) {
$this->project = new \Nemundo\Content\App\Project\Data\Project\ProjectRow($this->row, $model);
}
}