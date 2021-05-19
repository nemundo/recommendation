<?php
namespace Nemundo\Content\App\WebCrawler\Data\Url;
class UrlReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UrlModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UrlModel();
}
/**
* @return UrlRow[]
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
* @return UrlRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UrlRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UrlRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}