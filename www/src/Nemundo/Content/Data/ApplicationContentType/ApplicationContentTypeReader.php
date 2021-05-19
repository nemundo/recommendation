<?php
namespace Nemundo\Content\Data\ApplicationContentType;
class ApplicationContentTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ApplicationContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApplicationContentTypeModel();
}
/**
* @return ApplicationContentTypeRow[]
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
* @return ApplicationContentTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ApplicationContentTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ApplicationContentTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}