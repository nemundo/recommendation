<?php
namespace Nemundo\Content\App\Feed\Data\WebCrawler;
class WebCrawlerPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new WebCrawlerRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}