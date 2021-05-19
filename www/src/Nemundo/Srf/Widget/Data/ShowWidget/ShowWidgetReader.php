<?php
namespace Nemundo\Srf\Widget\Data\ShowWidget;
class ShowWidgetReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ShowWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ShowWidgetModel();
}
/**
* @return ShowWidgetRow[]
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
* @return ShowWidgetRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ShowWidgetRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ShowWidgetRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}