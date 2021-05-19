<?php
namespace Nemundo\Content\App\Project\Data\ProjectPhase;
class ProjectPhaseReader extends \Nemundo\Model\Reader\ModelDataReader {
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
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return ProjectPhaseRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ProjectPhaseRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ProjectPhaseRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}