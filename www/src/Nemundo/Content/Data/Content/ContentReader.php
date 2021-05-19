<?php
namespace Nemundo\Content\Data\Content;
class ContentReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentModel();
}
/**
* @return \Nemundo\Content\Row\ContentCustomRow[]
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
* @return \Nemundo\Content\Row\ContentCustomRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \Nemundo\Content\Row\ContentCustomRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \Nemundo\Content\Row\ContentCustomRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}