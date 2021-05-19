<?php
namespace Nemundo\App\Help\Data\Project;
class ProjectPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ProjectModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProjectModel();
}
/**
* @return ProjectRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ProjectRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}