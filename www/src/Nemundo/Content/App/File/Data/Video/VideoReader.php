<?php
namespace Nemundo\Content\App\File\Data\Video;
class VideoReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var VideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VideoModel();
}
/**
* @return VideoRow[]
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
* @return VideoRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return VideoRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new VideoRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}