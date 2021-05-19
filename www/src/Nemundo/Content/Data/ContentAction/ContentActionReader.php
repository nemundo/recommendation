<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ContentActionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentActionModel();
}
/**
* @return ContentActionRow[]
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
* @return ContentActionRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ContentActionRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ContentActionRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}