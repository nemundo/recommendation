<?php
namespace Nemundo\App\Application\Data\Project;
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
* @return \Nemundo\App\Application\Row\ProjectCustomRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \Nemundo\App\Application\Row\ProjectCustomRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}