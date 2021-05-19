<?php
namespace Nemundo\Content\Index\Tree\Data\RestrictedContentType;
class RestrictedContentTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var RestrictedContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RestrictedContentTypeModel();
}
/**
* @return RestrictedContentTypeRow[]
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
* @return RestrictedContentTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return RestrictedContentTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new RestrictedContentTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}