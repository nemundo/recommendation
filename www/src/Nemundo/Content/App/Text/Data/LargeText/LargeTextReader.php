<?php
namespace Nemundo\Content\App\Text\Data\LargeText;
class LargeTextReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextModel();
}
/**
* @return LargeTextRow[]
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
* @return LargeTextRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return LargeTextRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new LargeTextRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}