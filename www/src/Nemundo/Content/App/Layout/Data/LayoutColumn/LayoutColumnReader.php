<?php
namespace Nemundo\Content\App\Layout\Data\LayoutColumn;
class LayoutColumnReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LayoutColumnModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LayoutColumnModel();
}
/**
* @return LayoutColumnRow[]
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
* @return LayoutColumnRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return LayoutColumnRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new LayoutColumnRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}