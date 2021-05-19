<?php
namespace Nemundo\Content\App\Explorer\Data\ExplorerContentType;
class ExplorerContentTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ExplorerContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ExplorerContentTypeModel();
}
/**
* @return ExplorerContentTypeRow[]
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
* @return ExplorerContentTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ExplorerContentTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ExplorerContentTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}