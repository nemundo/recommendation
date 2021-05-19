<?php
namespace Nemundo\Content\App\Map\Data\SwissMapContent;
class SwissMapContentReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SwissMapContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SwissMapContentModel();
}
/**
* @return SwissMapContentRow[]
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
* @return SwissMapContentRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SwissMapContentRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SwissMapContentRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}