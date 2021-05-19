<?php
namespace Nemundo\Content\App\Website\Data\Website;
class WebsitePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new WebsiteRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}