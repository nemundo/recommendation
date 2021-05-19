<?php
namespace Nemundo\App\Application\Data\Project;
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