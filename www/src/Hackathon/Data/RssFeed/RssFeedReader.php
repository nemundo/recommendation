<?php
namespace Hackathon\Data\RssFeed;
class RssFeedReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var RssFeedModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RssFeedModel();
}
/**
* @return RssFeedRow[]
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
* @return RssFeedRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return RssFeedRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new RssFeedRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}