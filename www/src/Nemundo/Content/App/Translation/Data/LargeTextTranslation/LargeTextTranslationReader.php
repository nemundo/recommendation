<?php
namespace Nemundo\Content\App\Translation\Data\LargeTextTranslation;
class LargeTextTranslationReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LargeTextTranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextTranslationModel();
}
/**
* @return LargeTextTranslationRow[]
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
* @return LargeTextTranslationRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return LargeTextTranslationRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new LargeTextTranslationRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}