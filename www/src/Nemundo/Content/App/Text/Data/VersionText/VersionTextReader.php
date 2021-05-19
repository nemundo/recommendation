<?php
namespace Nemundo\Content\App\Text\Data\VersionText;
class VersionTextReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var VersionTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VersionTextModel();
}
/**
* @return VersionTextRow[]
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
* @return VersionTextRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return VersionTextRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new VersionTextRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}