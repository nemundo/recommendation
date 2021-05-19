<?php
namespace Nemundo\Content\App\Project\Data\ProjectPhase;
class ProjectPhaseCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ProjectPhaseModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProjectPhaseModel();
}
}