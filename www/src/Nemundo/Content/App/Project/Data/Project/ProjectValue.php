<?php
namespace Nemundo\Content\App\Project\Data\Project;
class ProjectValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ProjectModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProjectModel();
}
}