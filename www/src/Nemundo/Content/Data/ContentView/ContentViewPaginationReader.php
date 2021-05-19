<?php
namespace Nemundo\Content\Data\ContentView;
class ContentViewPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ContentViewModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentViewModel();
}
/**
* @return ContentViewRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ContentViewRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}