<?php
namespace Nemundo\Content\Data\ContentIndex;
class ContentIndexReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ContentIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentIndexModel();
}
/**
* @return ContentIndexRow[]
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
* @return ContentIndexRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ContentIndexRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ContentIndexRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}