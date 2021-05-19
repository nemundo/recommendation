<?php
namespace Nemundo\Content\App\File\Data\WebFile;
class WebFileReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WebFileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebFileModel();
}
/**
* @return WebFileRow[]
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
* @return WebFileRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WebFileRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WebFileRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}