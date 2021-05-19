<?php
namespace Nemundo\Content\Data\IndexType;
class IndexTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var IndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IndexTypeModel();
}
/**
* @return IndexTypeRow[]
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
* @return IndexTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return IndexTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new IndexTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}