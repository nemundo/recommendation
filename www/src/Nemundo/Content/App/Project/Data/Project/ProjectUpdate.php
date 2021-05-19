<?php
namespace Nemundo\Content\App\Project\Data\Project;
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

public function __construct() {
parent::__construct();
$this->model = new ProjectModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->project, $this->project);
parent::update();
}
}