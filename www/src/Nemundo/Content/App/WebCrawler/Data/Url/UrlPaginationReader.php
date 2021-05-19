<?php
namespace Nemundo\Content\App\WebCrawler\Data\Url;
class UrlPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new UrlRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}