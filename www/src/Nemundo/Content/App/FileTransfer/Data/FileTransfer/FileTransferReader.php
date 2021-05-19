<?php
namespace Nemundo\Content\App\FileTransfer\Data\FileTransfer;
class FileTransferReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var FileTransferModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileTransferModel();
}
/**
* @return FileTransferRow[]
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
* @return FileTransferRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return FileTransferRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new FileTransferRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}