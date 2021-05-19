<?php
namespace Nemundo\Content\App\Translation\Data\TextTranslation;
class TextTranslationReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TextTranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextTranslationModel();
}
/**
* @return TextTranslationRow[]
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
* @return TextTranslationRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TextTranslationRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TextTranslationRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}