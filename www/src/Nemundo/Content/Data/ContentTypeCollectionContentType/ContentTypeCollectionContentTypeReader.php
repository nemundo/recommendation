<?php
namespace Nemundo\Content\Data\ContentTypeCollectionContentType;
class ContentTypeCollectionContentTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ContentTypeCollectionContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionContentTypeModel();
}
/**
* @return ContentTypeCollectionContentTypeRow[]
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
* @return ContentTypeCollectionContentTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ContentTypeCollectionContentTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ContentTypeCollectionContentTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}