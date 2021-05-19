<?php
namespace Hackathon\Data\Keyword;
class KeywordReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var KeywordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KeywordModel();
}
/**
* @return KeywordRow[]
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
* @return KeywordRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return KeywordRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new KeywordRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}