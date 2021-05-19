<?php
namespace Nemundo\App\CssDesigner\Data\StyleType;
class StyleTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var StyleTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StyleTypeModel();
}
/**
* @return StyleTypeRow[]
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
* @return StyleTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return StyleTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new StyleTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}