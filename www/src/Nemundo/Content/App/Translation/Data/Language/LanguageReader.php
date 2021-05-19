<?php
namespace Nemundo\Content\App\Translation\Data\Language;
class LanguageReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LanguageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LanguageModel();
}
/**
* @return \Nemundo\Content\App\Translation\Row\LanguageCustomRow[]
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
* @return \Nemundo\Content\App\Translation\Row\LanguageCustomRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \Nemundo\Content\App\Translation\Row\LanguageCustomRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \Nemundo\Content\App\Translation\Row\LanguageCustomRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}