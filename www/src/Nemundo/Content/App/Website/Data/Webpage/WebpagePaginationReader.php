<?php
namespace Nemundo\Content\App\Website\Data\Webpage;
class WebpagePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WebpageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebpageModel();
}
/**
* @return WebpageRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WebpageRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}