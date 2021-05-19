<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo;
class TimelapseVideoReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TimelapseVideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimelapseVideoModel();
}
/**
* @return TimelapseVideoRow[]
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
* @return TimelapseVideoRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TimelapseVideoRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TimelapseVideoRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}