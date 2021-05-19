<?php
namespace Nemundo\Content\App\Project\Data\ProjectPhase;
use Nemundo\Model\Id\AbstractModelIdValue;
class ProjectPhaseId extends AbstractModelIdValue {
/**
* @var ProjectPhaseModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProjectPhaseModel();
}
}