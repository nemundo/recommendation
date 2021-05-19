<?php
namespace Nemundo\App\Help\Data\Topic;
class TopicReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TopicModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TopicModel();
}
/**
* @return TopicRow[]
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
* @return TopicRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TopicRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TopicRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}