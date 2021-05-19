<?php
namespace Nemundo\Content\App\Translation\Data\Translation;
class TranslationReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TranslationModel();
}
/**
* @return TranslationRow[]
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
* @return TranslationRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TranslationRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TranslationRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}