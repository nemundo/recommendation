<?php
namespace Nemundo\App\Application\Data\Project;
use Nemundo\Model\Data\AbstractModelUpdate;
class ProjectUpdate extends AbstractModelUpdate {
/**
* @var ProjectModel
*/
public $model;

/**
* @var string
*/
public $project;

/**
* @var string
*/
public $phpClass;

public function __construct() {
parent::__construct();
$this->model = new ProjectModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->project, $this->project);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
parent::update();
}
}