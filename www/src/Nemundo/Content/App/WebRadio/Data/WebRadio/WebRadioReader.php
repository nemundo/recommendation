<?php
namespace Nemundo\Content\App\WebRadio\Data\WebRadio;
class WebRadioReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WebRadioModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebRadioModel();
}
/**
* @return WebRadioRow[]
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
* @return WebRadioRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WebRadioRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WebRadioRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}