<?php
namespace Nemundo\Content\App\Feed\Data\WebCrawler;
class WebCrawlerReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WebCrawlerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebCrawlerModel();
}
/**
* @return WebCrawlerRow[]
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
* @return WebCrawlerRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WebCrawlerRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WebCrawlerRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}