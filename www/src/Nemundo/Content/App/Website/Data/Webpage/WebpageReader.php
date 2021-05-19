<?php
namespace Nemundo\Content\App\Website\Data\Webpage;
class WebpageReader extends \Nemundo\Model\Reader\ModelDataReader {
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
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return WebpageRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WebpageRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WebpageRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}