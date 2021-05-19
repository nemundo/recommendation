<?php
namespace Nemundo\Content\App\Text\Data\TextIndex;
class TextIndexReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TextIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextIndexModel();
}
/**
* @return TextIndexRow[]
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
* @return TextIndexRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TextIndexRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TextIndexRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}