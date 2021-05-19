<?php
namespace Nemundo\Content\App\Video\Data\IframeVideo;
class IframeVideoReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var IframeVideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IframeVideoModel();
}
/**
* @return IframeVideoRow[]
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
* @return IframeVideoRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return IframeVideoRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new IframeVideoRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}