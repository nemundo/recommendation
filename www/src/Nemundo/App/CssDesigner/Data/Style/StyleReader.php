<?php
namespace Nemundo\App\CssDesigner\Data\Style;
class StyleReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var StyleModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StyleModel();
}
/**
* @return StyleRow[]
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
* @return StyleRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return StyleRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new StyleRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}