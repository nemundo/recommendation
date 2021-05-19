<?php
namespace Hackathon\Data\NewsIndex;
class NewsIndexReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var NewsIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsIndexModel();
}
/**
* @return NewsIndexRow[]
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
* @return NewsIndexRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return NewsIndexRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new NewsIndexRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}