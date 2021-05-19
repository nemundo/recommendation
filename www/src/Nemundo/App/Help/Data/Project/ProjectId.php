<?php
namespace Nemundo\App\Help\Data\Project;
use Nemundo\Model\Id\AbstractModelIdValue;
class ProjectId extends AbstractModelIdValue {
/**
* @var ProjectModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProjectModel();
}
}