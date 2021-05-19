<?php
namespace Nemundo\Content\App\File\Data\DownloadJob;
class DownloadJobReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var DownloadJobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DownloadJobModel();
}
/**
* @return DownloadJobRow[]
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
* @return DownloadJobRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return DownloadJobRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new DownloadJobRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}