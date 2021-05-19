<?php
namespace Nemundo\App\Help\Data\Project;
class ProjectCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ProjectModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProjectModel();
}
}