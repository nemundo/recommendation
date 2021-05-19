<?php
namespace Nemundo\Content\App\File\Data\File;
class FileReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var FileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileModel();
}
/**
* @return FileRow[]
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
* @return FileRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return FileRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new FileRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}