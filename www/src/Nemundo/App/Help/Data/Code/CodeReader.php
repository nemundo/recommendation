<?php
namespace Nemundo\App\Help\Data\Code;
class CodeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var CodeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CodeModel();
}
/**
* @return CodeRow[]
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
* @return CodeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return CodeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new CodeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}