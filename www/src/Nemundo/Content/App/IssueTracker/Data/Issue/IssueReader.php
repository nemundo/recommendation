<?php
namespace Nemundo\Content\App\IssueTracker\Data\Issue;
class IssueReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var IssueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IssueModel();
}
/**
* @return IssueRow[]
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
* @return IssueRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return IssueRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new IssueRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}