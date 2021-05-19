<?php
namespace Nemundo\App\Application\Data\Project;
class ProjectBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ProjectModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->project, $this->project);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$id = parent::save();
return $id;
}
}