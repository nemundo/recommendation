<?php
namespace Hackathon\Data\NewsType;
class NewsTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var NewsTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsTypeModel();
}
/**
* @return NewsTypeRow[]
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
* @return NewsTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return NewsTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new NewsTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}