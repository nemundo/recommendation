<?php
namespace Nemundo\Content\App\IssueTracker\Data\Priority;
class PriorityReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PriorityModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PriorityModel();
}
/**
* @return PriorityRow[]
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
* @return PriorityRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PriorityRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PriorityRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}