<?php
namespace Nemundo\Content\App\Project\Data\Project;
class Project extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ProjectModel
*/
protected $model;

/**
* @var string
*/
public $project;

public function __construct() {
parent::__construct();
$this->model = new ProjectModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->project, $this->project);
$id = parent::save();
return $id;
}
}