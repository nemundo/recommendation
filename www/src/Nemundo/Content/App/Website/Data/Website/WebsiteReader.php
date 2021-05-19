<?php
namespace Nemundo\Content\App\Website\Data\Website;
class WebsiteReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WebsiteModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebsiteModel();
}
/**
* @return WebsiteRow[]
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
* @return WebsiteRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WebsiteRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WebsiteRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}