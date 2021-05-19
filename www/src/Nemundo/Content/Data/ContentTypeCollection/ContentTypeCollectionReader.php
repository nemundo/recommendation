<?php
namespace Nemundo\Content\Data\ContentTypeCollection;
class ContentTypeCollectionReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ContentTypeCollectionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeCollectionModel();
}
/**
* @return ContentTypeCollectionRow[]
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
* @return ContentTypeCollectionRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ContentTypeCollectionRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ContentTypeCollectionRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}