<?php
namespace Nemundo\Content\App\Project\Data\Project;
class ProjectDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ProjectModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProjectModel();
}
}