<?php
namespace Nemundo\Content\App\Project\Data\ProjectPhase;
class ProjectPhaseDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ProjectPhaseModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProjectPhaseModel();
}
}