<?php
namespace Hackathon\Data\WordIndex;
class WordIndexReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WordIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WordIndexModel();
}
/**
* @return WordIndexRow[]
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
* @return WordIndexRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WordIndexRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WordIndexRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}