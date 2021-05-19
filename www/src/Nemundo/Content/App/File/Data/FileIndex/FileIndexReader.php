<?php
namespace Nemundo\Content\App\File\Data\FileIndex;
class FileIndexReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var FileIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileIndexModel();
}
/**
* @return FileIndexRow[]
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
* @return FileIndexRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return FileIndexRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new FileIndexRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}