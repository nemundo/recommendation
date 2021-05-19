<?php
namespace Nemundo\Content\App\Project\Data\ProjectPhase;
use Nemundo\Model\Data\AbstractModelUpdate;
class ProjectPhaseUpdate extends AbstractModelUpdate {
/**
* @var ProjectPhaseModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->projectId, $this->projectId);
$this->typeValueList->setModelValue($this->model->projectPhase, $this->projectPhase);
parent::update();
}
}