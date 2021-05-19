<?php
namespace Nemundo\Content\Data\ContentView;
class ContentViewReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ContentViewModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentViewModel();
}
/**
* @return ContentViewRow[]
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
* @return ContentViewRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ContentViewRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ContentViewRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}