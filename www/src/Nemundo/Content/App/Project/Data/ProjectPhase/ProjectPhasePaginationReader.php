<?php
namespace Nemundo\Content\App\Project\Data\ProjectPhase;
class ProjectPhasePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ProjectPhaseModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProjectPhaseModel();
}
/**
* @return ProjectPhaseRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ProjectPhaseRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}