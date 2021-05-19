<?php
namespace Nemundo\Content\App\Text\Data\Text;
class TextReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextModel();
}
/**
* @return TextRow[]
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
* @return TextRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TextRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TextRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}