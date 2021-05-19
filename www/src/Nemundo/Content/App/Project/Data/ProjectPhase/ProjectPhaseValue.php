<?php
namespace Nemundo\Content\App\Project\Data\ProjectPhase;
class ProjectPhaseValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ProjectPhaseModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProjectPhaseModel();
}
}