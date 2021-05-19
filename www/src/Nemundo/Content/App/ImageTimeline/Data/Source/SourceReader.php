<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Source;
class SourceReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SourceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceModel();
}
/**
* @return SourceRow[]
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
* @return SourceRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SourceRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SourceRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}