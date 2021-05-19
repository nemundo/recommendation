<?php
namespace Nemundo\Content\App\Project\Data\ProjectPhase;
class ProjectPhaseBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ProjectPhaseModel
*/
protected $model;

/**
* @var string
*/
public $projectId;

/**
* @var string
*/
public $projectPhase;

public function __construct() {
parent::__construct();
$this->model = new ProjectPhaseModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->projectId, $this->projectId);
$this->typeValueList->setModelValue($this->model->projectPhase, $this->projectPhase);
$id = parent::save();
return $id;
}
}