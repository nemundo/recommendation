<?php
namespace Nemundo\Content\Data\ViewContentType;
class ViewContentTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ViewContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ViewContentTypeModel();
}
/**
* @return ViewContentTypeRow[]
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
* @return ViewContentTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ViewContentTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ViewContentTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}